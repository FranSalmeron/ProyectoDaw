import React, { useState, useEffect, useRef } from 'react';
import { toast } from 'react-toastify';
import { createChat } from '../helpers/chatHelper';
import { loadMessages, sendMessage, pollTaskStatus } from '../helpers/chatMessageHelper';
import { getUserIdFromToken } from '../helpers/decodeToken';
import { useNavigate, useParams } from 'react-router-dom';

const Chat = () => {
  // Extraemos los parámetros de la URL
  const { userId, carId, buyerId } = useParams();
  
  const [messages, setMessages] = useState([]);
  const [messageInput, setMessageInput] = useState('');
  const [loading, setLoading] = useState(true);
  const [chatId, setChatId] = useState(0);
  const [isSending, setIsSending] = useState(false);
  const [isAtBottom, setIsAtBottom] = useState(true);
  const [taskId, setTaskId] = useState(null);

  const MAX_CHARACTERS = 500;
  const currentUserId = getUserIdFromToken();
  const messagesEndRef = useRef(null);

  const navigate = useNavigate(); // Usamos el hook navigate

  // **Crear el chat si no existe**
  useEffect(() => {
    const createChatIfNotExists = async () => {
      if (!buyerId || !userId || !carId) {
        toast.error("Error de red");
        navigate('/');  
        return;
      }

      try {
        const chatIdResponse = await createChat(userId, buyerId, carId);
        if (chatIdResponse) {
          setChatId(chatIdResponse);
        } else {
          navigate('/'); 
        }
      } catch (error) {
        console.error('Error al crear el chat:', error);
        toast.error('Error al crear el chat.');
      }
    };

    createChatIfNotExists();
  }, [buyerId, userId, carId, navigate]);

  // **Cargar mensajes y empezar polling solo si no hay taskId**
  useEffect(() => {
    if (chatId) {
      if (!taskId) {
        const loadMessagesForChat = async () => {
          setLoading(true);
          const newTaskId = await loadMessages(chatId, setLoading);

          if (newTaskId) {
            setTaskId(newTaskId);
            // Iniciar el polling con taskId una vez que haya sido asignado
            startPolling(newTaskId);
          }
        };

        loadMessagesForChat(); // Cargar mensajes y empezar el polling
      }
    }
  }, [chatId, taskId]); // Este useEffect solo se ejecuta cuando chatId está disponible

  // **Iniciar el polling cada 15 segundos (actualización periódica de mensajes)**
  const startPolling = (taskId) => {
    const intervalId = setInterval(async () => {
      if (taskId) {
        await loadMessages(chatId, setLoading, taskId);  // Recargar mensajes
        pollTaskStatus(taskId, setMessages, setLoading, messages);
      }
    }, 15000);  // Polling cada 15 segundos

    // Limpiar el intervalo cuando el componente se desmonte o el chat se cierre
    return intervalId;
  };

  // **Manejar el cambio de página para detener el polling**
  useEffect(() => {
    // Esta función se ejecuta al cambiar de página, limpiamos el intervalo.
    const clearPolling = () => {
      if (taskId) {
        // Si hay un taskId, limpiamos el intervalo y el taskId
        clearInterval(taskId);
        setTaskId(null);
      }
    };

    // Si el componente se desmonta (cambio de página)
    return () => {
      clearPolling();
    };
  }, [taskId]); // El efecto se ejecuta cuando el `taskId` cambia

  // **Enviar mensaje al chat**
  const sendMessageToChat = async () => {
    if (!messageInput.trim() || !chatId || !taskId) return;
    if (messageInput.length > MAX_CHARACTERS) {
      toast.error(`El mensaje no puede tener más de ${MAX_CHARACTERS} caracteres.`);
      return;
    }

    setIsSending(true);

    try {
      const response = await sendMessage(chatId, currentUserId, messageInput, taskId);
      setMessageInput('');
      if (response && response.success) {
        setMessages((prevMessages) => [
          ...prevMessages,
          {
            messageId: Date.now(),
            content: messageInput,
            userId: currentUserId,
            messageDate: new Date().toISOString(),
          },
        ]);
      }
    } catch (error) {
      console.error('Error al enviar el mensaje:', error);
    } finally {
      setIsSending(false);
    }
  };

  // **Autoscroll al final del chat**
  useEffect(() => {
    if (isAtBottom && messagesEndRef.current) {
      messagesEndRef.current.scrollIntoView({ behavior: 'smooth' });
    }
  }, [messages, isAtBottom]);

  const handleScroll = () => {
    const bottom = messagesEndRef.current?.getBoundingClientRect().top <= window.innerHeight;
    setIsAtBottom(bottom);
  };

  useEffect(() => {
    window.addEventListener('scroll', handleScroll);
    return () => window.removeEventListener('scroll', handleScroll);
  }, []);

  if (loading) {
    return <div className="text-center text-gray-500">Cargando...</div>;
  }

  return (
    <div className="chat-container p-4 max-w-3xl mx-auto">
      <h2 className="text-2xl font-semibold mb-6">Chat</h2>
      <div className="messages-container space-y-4 mb-4 max-h-[400px] overflow-y-auto">
        {messages.map((message) => (
          <div key={message.messageId} className={`message p-3 rounded-lg max-w-xs ${message.userId === currentUserId ? 'ml-auto bg-blue-500 text-white' : 'mr-auto bg-blue-100 text-gray-800'}`}>
            <p>{message.content}</p>
            <small className="text-xs opacity-75">{new Date(message.messageDate).toLocaleTimeString()}</small>
          </div>
        ))}
        <div ref={messagesEndRef} />
      </div>

      <div className="mt-4">
        <textarea
          value={messageInput}
          onChange={(e) => setMessageInput(e.target.value)}
          className="w-full p-2 border border-gray-300 rounded-lg"
          placeholder="Escribe un mensaje..."
        />
        <button
          onClick={sendMessageToChat}
          className={`mt-2 p-2 text-white rounded-lg w-full ${isSending ? 'bg-gray-400' : 'bg-blue-500'} ${isSending ? 'cursor-not-allowed' : ''}`}
          disabled={isSending}
        >
          {isSending ? <div className="w-4 h-4 border-2 border-white border-t-transparent rounded-full animate-spin"></div> : 'Enviar'}
        </button>
      </div>
    </div>
  );
};

export default Chat;
