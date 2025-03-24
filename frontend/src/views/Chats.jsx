import React, { useEffect, useState } from 'react';
import { listChats } from '../helpers/chatHelper';
import { carById } from '../helpers/carHelper';
import { toast } from 'react-toastify';

const Chats = ({ userIdApi, setPage, setSelectedVendor, username }) => {
  const [chats, setChats] = useState([]);
  const [loading, setLoading] = useState(true);
  const [chatDetails, setChatDetails] = useState([]); 

  useEffect(() => {
    const fetchChats = async () => {
      try {
        // Obtenemos los chats del usuario
        const chatList = await listChats(userIdApi);
        setChats(chatList);

        // Ahora vamos a obtener los detalles de los coches secuencialmente
        const detailsWithCars = [];
        for (const chat of chatList) {
          const data = await carById(chat.car); 
          detailsWithCars.push({
            chatId: chat.chatId,
            seller: chat.seller,
            buyer: chat.buyer,
            car: data,
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
  const handleChatClick = (chatDetails) => {
    setSelectedVendor({ sellerId: chatDetails.car.User.id, carId: chatDetails.car.id, buyerId: chatDetails.buyer });
    setPage('chat');
  };

  if (loading) {
    return <div className="text-center text-gray-500">Cargando chats...</div>;
  }

  return (
    <div className="max-w-3xl mx-auto p-4">
      <h2 className="text-2xl font-semibold text-center mb-6">Mis Chats</h2>
      {chats.length === 0 ? (
        <p className="text-center text-gray-500">No tienes chats activos.</p>
      ) : (
        <ul className="space-y-4">
          {chatDetails.map((chatDetailsItem) => (
            <li
              key={chatDetailsItem.chatId}
              className="flex items-center space-x-4 p-4 bg-white border border-gray-200 rounded-lg shadow hover:shadow-lg transition-shadow cursor-pointer"
              onClick={() => handleChatClick(chatDetailsItem)}
            >
              {/* Imagen del coche */}
              <div className="w-16 h-16 flex-shrink-0">
                <img
                  src={chatDetailsItem.car.images[0]} // La primera imagen del coche
                  alt="Car"
                  className="object-cover w-full h-full rounded-full"
                />
              </div>

              {/* Detalles del chat */}
              <div className="flex flex-col justify-between flex-grow">
                <p className="text-sm font-semibold text-gray-800">
                  Vendedor: {chatDetailsItem.car.User.name}
                </p>
                <p className="text-sm text-gray-500">
                  Comprador interesado: {chatDetailsItem.buyer} {/* Arreglar mas adelante para que ponga el nombre*/ }
                </p>
                <p className="text-sm text-gray-700">
                  Marca/Modelo: {chatDetailsItem.car.brand} {chatDetailsItem.car.model}
                </p>
                <p className="text-xs text-gray-400">
                  Fecha de creación: {new Date(chatDetailsItem.createdDate).toLocaleString()}
                </p>
              </div>
            </li>
          ))}
        </ul>
      )}
    </div>
  );
};

export default Chats;

