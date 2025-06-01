import React, { useState, useEffect, useRef } from 'react';
import { toast } from 'react-toastify';
import { createChat } from '../helpers/chatHelper';
import { loadMessages, sendMessage } from '../helpers/chatMessageHelper';
import { getUserIdFromToken } from '../helpers/decodeToken';
import { useNavigate, useLocation } from 'react-router-dom';
import { useDarkMode } from '../context/DarkModeContext'; // <-- Importa useDarkMode

const Chat = () => {
  const location = useLocation();
  const { sellerId, carId, buyerId } = location.state;
  const [messages, setMessages] = useState([]);
  const [messageInput, setMessageInput] = useState('');
  const [loading, setLoading] = useState(true);
  const [chatId, setChatId] = useState(0);
  const [isSending, setIsSending] = useState(false);
  const [isAtBottom, setIsAtBottom] = useState(true);
  const [shouldScroll, setShouldScroll] = useState(true);
  const navigate = useNavigate();

  const MAX_CHARACTERS = 500;
  const currentuserId = getUserIdFromToken();
  const messagesEndRef = useRef(null);

  const canWrite = currentuserId == sellerId || currentuserId == buyerId;

  const { isDarkMode } = useDarkMode(); // <-- Usamos el hook

  // Clases condicionales para modo oscuro
  const bgMain = isDarkMode ? "bg-[#1C1C1E] text-white" : "bg-[#F5EFEB] text-black";
  const bgChatBox = isDarkMode ? "bg-[#2C2C2E]" : "bg-white";
  const borderInput = isDarkMode ? "border-gray-600 bg-[#1C1C1E] text-white placeholder-gray-400" : "border-gray-300 bg-white text-black placeholder-gray-500";
  const btnSending = isSending ? "bg-[#B6CADE]" : "bg-[#43697a]";
  const btnCursor = isSending ? "cursor-not-allowed" : "";

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

  useEffect(() => {
    if (!chatId) return;

    const fetchMessages = async () => {
      setLoading(true);
      await loadMessages(chatId, setMessages, setLoading);
    };

    fetchMessages();

    const intervalId = setInterval(fetchMessages, 5000);

    return () => clearInterval(intervalId);
  }, [chatId]);

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
        await loadMessages(chatId, setMessages, () => {});
      }
    } catch (error) {
      console.error('Error al enviar el mensaje:', error);
    } finally {
      setIsSending(false);
    }
  };

  useEffect(() => {
    if (shouldScroll && isAtBottom && messagesEndRef.current) {
      messagesEndRef.current.scrollIntoView({ behavior: 'smooth' });
      setShouldScroll(false);
    }
  }, [messages, isAtBottom, shouldScroll]);

  const handleScroll = () => {
    const bottom = messagesEndRef.current?.getBoundingClientRect().top <= window.innerHeight;
    setIsAtBottom(bottom);

    if (!bottom) {
      setShouldScroll(true);
    }
  };

  return (
    <div className={`${bgMain} min-h-screen p-4 transition-colors duration-300`}>
      <div className={`chat-container p-4 max-w-3xl mx-auto h-auto rounded-lg shadow-md ${bgChatBox}`}>
        <h2 className="text-2xl font-semibold mb-6">Chat</h2>
        <div
          className="messages-container space-y-4 mb-4 max-h-[400px] overflow-y-auto"
          onScroll={handleScroll}
        >
          {messages.map((message) => (
            <div
              key={message.messageId}
              className={`message p-3 rounded-lg max-w-xs ${
                message.userId == currentuserId
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
              className={`w-full p-2 border rounded-lg resize-none h-24 placeholder-opacity-75 ${borderInput}`}
              placeholder="Escribe un mensaje..."
            />
            <button
              onClick={sendMessageToChat}
              className={`mt-2 p-2 text-white rounded-lg w-full ${btnSending} ${btnCursor}`}
              disabled={isSending}
            >
              {isSending ? (
                <div className="w-4 h-4 border-2 border-white border-t-transparent rounded-full animate-spin mx-auto"></div>
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