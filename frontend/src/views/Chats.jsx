import React, { useEffect, useState } from 'react';
import { listChats } from '../helpers/chatHelper';

const Chats = ({ userIdApi, setPage, setSelectedVendor }) => {
  const [chats, setChats] = useState([]);
  const [loading, setLoading] = useState(true);
  

  useEffect(() => {
    // Llamamos a la función listChats para obtener todos los chats
    const fetchChats = async () => {
      try {
        const chatList = await listChats(userIdApi);
        setChats(chatList);
      } catch (error) {
        console.error('Error al obtener los chats:', error);
      } finally {
        setLoading(false);
      }
    };

    fetchChats();
  }, [userIdApi]);

  // Maneja el clic para redirigir al chat correspondiente
  const handleChatClick = () => {
    // Redirige a la página del chat con el chatId
    setSelectedVendor({ sellerId: car.User.id, carId: car.id });
    setPage('chat');
  };

  if (loading) {
    return <div>Cargando chats...</div>;
  }

  return (
    <div>
      <h2>Mis Chats</h2>
      {chats.length === 0 ? (
        <p>No tienes chats activos.</p>
      ) : (
        <ul>
          {chats.map((chat) => (
            <li key={chat.chatId} className="chat-item" onClick={() => handleChatClick()}>
              <div className="chat-info">
                <p>Chat con el vendedor {chat.seller}</p>
                <p>Para el coche {chat.car}</p>
                <p>Fecha de creación: {chat.createdDate}</p>
              </div>
            </li>
          ))}
        </ul>
      )}
    </div>
  );
};

export default Chats;
