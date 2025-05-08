import React, { useState, useEffect, useRef } from 'react';
import { toast } from 'react-toastify';
import { createChat } from '../helpers/chatHelper';
import { loadMessages, sendMessage } from '../helpers/chatMessageHelper';
import { getUserIdFromToken } from '../helpers/decodeToken';
import { useNavigate, useLocation } from 'react-router-dom';

const Chat = () => {
  // Extraemos los parámetros de la URL
  const location = useLocation();
  const { sellerId, carId, buyerId } = location.state;
  const [messages, setMessages] = useState([]);
  const [messageInput, setMessageInput] = useState('');
  const [loading, setLoading] = useState(true);
  const [chatId, setChatId] = useState(0);
  const [isSending, setIsSending] = useState(false);
  const [isAtBottom, setIsAtBottom] = useState(true);
  const [shouldScroll, setShouldScroll] = useState(true); // Nueva bandera para controlar el autoscroll
  const navigate = useNavigate();

  const MAX_CHARACTERS = 500;
  const currentuserId = getUserIdFromToken();
  const messagesEndRef = useRef(null);

  const canWrite = currentuserId == sellerId || currentuserId == buyerId;

  // **Crear el chat si no existe**
  useEffect(() => {
    const createChatIfNotExists = async () => {
      if (!buyerId || !sellerId || !carId) {
        toast.error("Error de red");
        navigate('/');  
        return;
      }

      try {
        const chatIdResponse = await createChat(sellerId, buyerId, carId);
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
  }, [buyerId, sellerId, carId, navigate]);

  // **Cargar mensajes directamente desde el backend cada 10s (polling)**
  useEffect(() => {
    if (!chatId) return;

    const fetchMessages = async () => {
      setLoading(true);
      await loadMessages(chatId, setMessages, setLoading);
    };

    fetchMessages(); // Cargar mensajes al inicio

    const intervalId = setInterval(fetchMessages, 10000); // Polling cada 10s

    return () => clearInterval(intervalId); // Limpiar el intervalo al desmontarse
  }, [chatId]);

  // **Enviar mensaje al chat**
  const sendMessageToChat = async () => {
    if (!messageInput.trim() || !chatId) return;
    if (messageInput.length > MAX_CHARACTERS) {
      toast.error(`El mensaje no puede tener más de ${MAX_CHARACTERS} caracteres.`);
      return;
    }

    setIsSending(true);

    try {
      const response = await sendMessage(chatId, currentuserId, messageInput);
      setMessageInput('');
      if (response && response.success) {
        // Recargar los mensajes después de enviar uno
        await loadMessages(chatId, setMessages, () => {});
      }
    } catch (error) {
      console.error('Error al enviar el mensaje:', error);
    } finally {
      setIsSending(false);
    }
  };

  // **Autoscroll al final del chat (modificado)**
  useEffect(() => {
    if (shouldScroll && isAtBottom && messagesEndRef.current) {
      messagesEndRef.current.scrollIntoView({ behavior: 'smooth' });
      setShouldScroll(false); // Desactivamos el autoscroll después de hacerlo una vez
    }
  }, [messages, isAtBottom, shouldScroll]);

  // **Manejo del scroll (detecta si estamos al final)**
  const handleScroll = () => {
    const bottom = messagesEndRef.current?.getBoundingClientRect().top <= window.innerHeight;
    setIsAtBottom(bottom);

    // Si el usuario no está al final, activamos el autoscroll para el siguiente cambio de mensaje
    if (!bottom) {
      setShouldScroll(true);
    }
  };

  return (
    <div className="min-h-screen bg-[#F5EFEB] p-4">
      <div className="chat-container p-4 max-w-3xl mx-auto h-auto bg-white rounded-lg">
        <h2 className="text-2xl font-semibold mb-6">Chat</h2>
        <div 
          className="messages-container space-y-4 mb-4 max-h-[400px] overflow-y-auto" 
          onScroll={handleScroll} // Detectamos el scroll para ver si estamos al final
        >
          {messages.map((message) => (
            <div
              key={message.messageId}
              className={`message p-3 rounded-lg max-w-xs ${message.userId == currentuserId ? 'ml-auto bg-[#9DB6CF] text-white' : 'mr-auto bg-[#D4E4ED] text-gray-800'}`}
            >
              <p>{message.content}</p>
              <small className="text-xs opacity-75">
                {new Date(message.messageDate).toLocaleTimeString()}
              </small>
            </div>
          ))}
          <div ref={messagesEndRef} />
        </div>
  
        {canWrite ? (
          <div className="mt-4">
            <textarea
              value={messageInput}
              onChange={(e) => setMessageInput(e.target.value)}
              className="w-full p-2 border border-gray-300 rounded-lg"
              placeholder="Escribe un mensaje..."
            />
            <button
              onClick={sendMessageToChat}
              className={`mt-2 p-2 text-white rounded-lg w-full ${isSending ? 'bg-[#B6CADE]' : 'bg-[#43697a]'} ${isSending ? 'cursor-not-allowed' : ''}`}
              disabled={isSending}
            >
              {isSending ? (
                <div className="w-4 h-4 border-2 border-white border-t-transparent rounded-full animate-spin"></div>
              ) : (
                'Enviar'
              )}
            </button>
          </div>
        ) : (
          <div className="text-center text-gray-400 mt-4 italic">
            No puedes enviar mensajes en este chat.
          </div>
        )}
      </div>
    </div>
  );
};

export default Chat;
