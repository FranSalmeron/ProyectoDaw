import React, { useState, useEffect } from 'react';
import { toast } from 'react-toastify';
import { createChat } from '../helpers/chatHelper';

import { loadMessages, sendMessage } from '../helpers/chatMessageHelper';

const Chat = ({ sellerId, carId, currentUserId }) => {
  const [messages, setMessages] = useState([]);
  const [messageInput, setMessageInput] = useState('');
  const [loading, setLoading] = useState(true);
  const [chatId, setChatId] = useState(null);

  
  // Crear el chat si no existe
  useEffect(() => {
    const createChatIfNotExists = async () => {
      if (!currentUserId || !sellerId || !carId) return;
      try {
        const chatIdResponse = await createChat(sellerId, currentUserId, carId);
        if (chatIdResponse) {
          setChatId(chatIdResponse);
          // Llamar a loadMessages directamente aquí si es necesario
          const loadedMessages = await loadMessages(chatIdResponse);
          setMessages(loadedMessages);
          setLoading(false); // Asegúrate de setear el estado de carga
        }
      } catch (error) {
        console.error('Error al crear el chat:', error);
        toast.error('Error al crear el chat.');
      }
    };

    createChatIfNotExists();
  }, [currentUserId, sellerId, carId]);

  // Función para enviar un mensaje
  const sendMessageToChat = async () => {
    if (!messageInput.trim() || !chatId) return; // No enviar si el mensaje está vacío

    try {
      await sendMessage(chatId, currentUserId, messageInput);
      setMessages((prevMessages) => [
        ...prevMessages,
        { content: messageInput, userId: currentUserId },
      ]);
      setMessageInput(''); // Limpiar el campo de entrada de texto
    } catch (error) {
      toast.error('Error al enviar el mensaje');
    }
  };

  if (loading) {
    return <div>Cargando...</div>;
  }

  return (
    <div className="chat-container p-4">
      <h2 className="text-2xl font-semibold">Chat</h2>
      <div className="messages-container space-y-4">
        {messages.map((message, index) => (
          <div
            key={index}
            className={`message p-2 rounded-lg max-w-xs ${
              message.userId === currentUserId
                ? 'ml-auto bg-blue-500 text-white' // Alineado a la derecha con fondo azul para el usuario actual
                : 'mr-auto bg-blue-200' // Alineado a la izquierda con fondo azul para el vendedor
            }`}
          >
            <p>{message.content}</p>
          </div>
        ))}
      </div>

      <div className="mt-4">
        <textarea
          value={messageInput}
          onChange={(e) => setMessageInput(e.target.value)}
          className="w-full p-2 border rounded"
          placeholder="Escribe un mensaje..."
        />
        <button className="mt-2 p-2 bg-blue-500 text-white rounded" onClick={sendMessageToChat}>
          Enviar
        </button>
      </div>
    </div>
  );
};

export default Chat;
