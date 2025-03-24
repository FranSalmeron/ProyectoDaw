import React, { useState, useEffect, useRef } from 'react';
import { toast } from 'react-toastify';
import { createChat } from '../helpers/chatHelper';
import { loadMessages, sendMessage } from '../helpers/chatMessageHelper';
import { getUserIdFromToken } from '../helpers/decodeToken';

const Chat = ({ sellerId, carId, buyerId, setPage }) => {
  const [messages, setMessages] = useState([]);
  const [messageInput, setMessageInput] = useState('');
  const [loading, setLoading] = useState(true);
  const [chatId, setChatId] = useState(null);
  const [isSending, setIsSending] = useState(false);
  
  const MAX_CHARACTERS = 500;
  const currentUserId = getUserIdFromToken();
  const messagesEndRef = useRef(null);

  // **Crear el chat si no existe**
  useEffect(() => {
    const createChatIfNotExists = async () => {
      if (!buyerId || !sellerId || !carId) {
        toast.error("Error de red");
        setPage('home');
        return;
      }
      try {
        const chatIdResponse = await createChat(sellerId, buyerId, carId);
        if (chatIdResponse) {
          setChatId(chatIdResponse);
          const loadedMessages = await loadMessages(chatIdResponse);
          setMessages(loadedMessages);
          setLoading(false);
        } else {
          setPage('home');
        }
      } catch (error) {
        console.error('Error al crear el chat:', error);
        toast.error('Error al crear el chat.');
      }
    };

    createChatIfNotExists();
  }, [buyerId, sellerId, carId]);

  // **Polling para cargar todos los mensajes regularmente**
  useEffect(() => {
    if (!chatId) return;

    const interval = setInterval(async () => {
      try {
        const loadedMessages = await loadMessages(chatId);
        if (loadedMessages.length > messages.length) {
          // Si los nuevos mensajes son más que los anteriores, se actualizan
          setMessages(loadedMessages);
        }
      } catch (error) {
        console.error('Error al cargar los mensajes', error);
      }
    }, 15000); // Polling cada 15 segundos

    return () => clearInterval(interval); // Limpiar el intervalo al desmontar el componente
  }, [chatId, messages.length]); // Dependencia en el número de mensajes para comparar la longitud

  // **Enviar mensaje al chat**
  const sendMessageToChat = async () => {
    if (!messageInput.trim() || !chatId) return;
    if (messageInput.length > MAX_CHARACTERS) {
      toast.error(`El mensaje no puede tener más de ${MAX_CHARACTERS} caracteres.`);
      return;
    }

    setIsSending(true);

    try {
      await sendMessage(chatId, currentUserId, messageInput);

      setMessages((prevMessages) => [...prevMessages, {
        messageId: Date.now(), // temporary ID
        content: messageInput,
        userId: currentUserId,
        messageDate: new Date().toISOString()
      }]);
      setMessageInput('');
    } catch (error) {
      toast.error('Error al enviar el mensaje');
    } finally {
      setIsSending(false);
    }
  };

  // **Autoscroll al final del chat**
  useEffect(() => {
    if (messagesEndRef.current) {
      messagesEndRef.current.scrollIntoView({ behavior: 'smooth' });
    }
  }, [messages]);

  if (loading) {
    return <div className="text-center text-gray-500">Cargando...</div>;
  }

  return (
    <div className="chat-container p-4 max-w-3xl mx-auto">
      <h2 className="text-2xl font-semibold mb-6">Chat</h2>
      <div className="messages-container space-y-4 mb-4 max-h-[400px] overflow-y-auto">
        {messages.map((message, index) => (
          <div key={message.messageId} className={`message p-3 rounded-lg max-w-xs ${message.userId == currentUserId ? 'ml-auto bg-blue-500 text-white' : 'mr-auto bg-blue-100 text-gray-800'}`}>
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
