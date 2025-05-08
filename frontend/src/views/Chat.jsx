import React, { useState, useEffect, useRef } from 'react';
import { toast } from 'react-toastify';
import { createChat } from '../helpers/chatHelper';
import { loadMessages, sendMessage } from '../helpers/chatMessageHelper';
import { getUserIdFromToken } from '../helpers/decodeToken';
import { useNavigate, useLocation } from 'react-router-dom';
import LoadingSpinner  from '../components/LoadingSpinner/LoadingSpinner';
import { sendMessageWS, connectToWebSocket, closeWebSocket } from '../helpers/webSocketHelper';

const Chat = () => {
  // Extraemos los parámetros de la URL
  const location = useLocation();
  const { userId, carId, buyerId } = location.state;
  
  const [messages, setMessages] = useState([]);
  const [messageInput, setMessageInput] = useState('');
  const [loading, setLoading] = useState(true);
  const [chatId, setChatId] = useState(0);
  const [isSending, setIsSending] = useState(false);
  const [isAtBottom, setIsAtBottom] = useState(true);
  const navigate = useNavigate();

  const MAX_CHARACTERS = 500;
  const currentUserId = getUserIdFromToken();
  const messagesEndRef = useRef(null);

  const canWrite = currentUserId == userId || currentUserId == buyerId;

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

  useEffect(() => {
    if (!chatId) return;
  
    // Cargar historial solo al inicio
    const fetchMessages = async () => {
      setLoading(true);
      await loadMessages(chatId, setMessages, setLoading);
    };
  
    fetchMessages();
  
    // Abrir WebSocket
    connectToWebSocket(chatId, currentUserId, (newMessage) => {
      setMessages((prevMessages) => [...prevMessages, newMessage]);
    });
  
    return () => {
      closeWebSocket();
    };
  }, [chatId]);
  
  // **Enviar mensaje al chat**
  const sendMessageToChat = () => {
    if (!messageInput.trim() || !chatId) return;
    if (messageInput.length > MAX_CHARACTERS) {
      toast.error(`El mensaje no puede tener más de ${MAX_CHARACTERS} caracteres.`);
      return;
    }
  
    sendMessageWS(chatId, currentUserId, messageInput);
    setMessageInput('');
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
    return (
      <div className="flex justify-center items-center mt-10">
        <LoadingSpinner /> {/* Usamos un spinner mientras se carga */}
      </div>
    );
  }

  return (
    <div className="min-h-screen bg-[#F5EFEB] p-4">
      <div className="chat-container p-4 max-w-3xl mx-auto h-auto bg-white rounded-lg">
        <h2 className="text-2xl font-semibold mb-6">Chat</h2>
        <div className="messages-container space-y-4 mb-4 max-h-[400px] overflow-y-auto">
          {messages.map((message) => (
            <div
              key={message.messageId}
              className={`message p-3 rounded-lg max-w-xs ${
                message.userId == userId
                  ? 'ml-auto bg-[#9DB6CF] text-white'
                  : 'mr-auto bg-[#D4E4ED] text-gray-800'
              }`}
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
              className={`mt-2 p-2 text-white rounded-lg w-full ${
                isSending ? 'bg-[#B6CADE]' : 'bg-[#43697a]'
              } ${isSending ? 'cursor-not-allowed' : ''}`}
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
