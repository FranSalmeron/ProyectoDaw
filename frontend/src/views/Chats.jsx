import React, { useEffect, useState } from 'react';
import { listChats } from '../helpers/chatHelper';
import { carById } from '../helpers/carHelper'; // Asegúrate de importar el método

const Chats = ({ userIdApi, setPage, setSelectedVendor }) => {
  const [chats, setChats] = useState([]);
  const [loading, setLoading] = useState(true);
  const [chatDetails, setChatDetails] = useState([]); // Para almacenar los chats con detalles del coche

  useEffect(() => {
    const fetchChats = async () => {
      try {
        // Obtenemos los chats del usuario
        const chatList = await listChats(userIdApi);
        setChats(chatList);

        // Ahora vamos a obtener los detalles de los coches secuencialmente
        const detailsWithCars = [];
        for (const chat of chatList) {
          const car = await carById(chat.car); // Obtenemos el coche con el carId
          detailsWithCars.push({
            chatId: chat.chatId,
            seller: chat.seller,
            car: car,
            createdDate: chat.createdDate,
          });
        }

        setChatDetails(detailsWithCars); // Actualizamos el estado con los chats y los coches
      } catch (error) {
        console.error('Error al obtener los chats:', error);
      } finally {
        setLoading(false);
      }
    };

    fetchChats();
  }, [userIdApi]);

  // Maneja el clic para redirigir al chat correspondiente
  const handleChatClick = (car) => {
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
          {chatDetails.map((chatDetailsItem) => (
            <li key={chatDetailsItem.chatId} className="chat-item" onClick={() => handleChatClick(chatDetailsItem.car)}>
              <div className="chat-info flex items-center space-x-4">
                {/* Imagen del coche */}
                <div className="car-image w-16 h-16">
                  <img
                    src={chatDetailsItem.car.images[0]} // La primera imagen del coche
                    alt="Car"
                    className="object-cover w-full h-full rounded-full"
                  />
                </div>

                <div className="chat-details">
                  <p className="text-sm font-semibold">Vendedor: {chatDetailsItem.seller}</p>
                  <p className="text-sm text-gray-500">Comprador interesado</p>
                  <p className="text-sm">Marca/Modelo: {chatDetailsItem.car.brand} {chatDetailsItem.car.model}</p>
                  <p className="text-xs text-gray-400">Fecha de creación: {new Date(chatDetailsItem.createdDate).toLocaleString()}</p>
                </div>
              </div>
            </li>
          ))}
        </ul>
      )}
    </div>
  );
};

export default Chats;
