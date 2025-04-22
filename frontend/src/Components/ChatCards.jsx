import React from "react";
import { useNavigate } from "react-router-dom";

const ChatCards = ({ chats }) => {
  const navigate = useNavigate();

  const handleOpenChat = (chat) => {
    // Redirigir al chat pasándole los datos necesarios
    navigate("/chat", {
      state: {
        userId: chat.seller.id,
        carId: chat.car.id,
        buyerId: chat.buyer.id,
      },
    });
  };

  return (
    <div class="bg-[#F5EFEB] min-h-screen p-5">
    <div className="max-w-3xl mx-auto p-4">
      {chats.length === 0 ? (
        <p className="text-center text-gray-500">No existen chats.</p>
      ) : (
        <ul className="space-y-4">
          {chats.map((chatItem) => (
            <li
              key={chatItem.chatId}
              className="flex items-center space-x-4 p-4 bg-white border border-gray-200 rounded-lg shadow hover:shadow-lg transition-shadow cursor-pointer"
              onClick={() => handleOpenChat(chatItem)}
            >
              {/* Imagen del coche o texto alternativo */}
              <div className="w-16 h-16 flex-shrink-0">
                {chatItem.car?.images?.[0] ? (
                  <img
                    src={chatItem.car.images[0]}
                    alt="Car"
                    className="object-cover w-full h-full rounded-full"
                  />
                ) : (
                  <div className="flex items-center justify-center bg-gray-200 rounded-full text-sm text-center text-gray-700">
                    {chatItem.car?.brand} {chatItem.car?.model}
                  </div>
                )}
              </div>
            
              {/* Detalles del chat */}
              <div className="flex flex-col justify-between flex-grow">
                <p className="text-sm font-semibold text-gray-800">
                  Vendedor: {chatItem.seller?.name || 'Sin nombre'}
                </p>
                <p className="text-sm text-gray-500">
                  Comprador interesado: {chatItem.buyer?.name || 'Sin nombre'}
                </p>
                <p className="text-sm text-gray-700">
                  Marca/Modelo: {chatItem.car?.brand} {chatItem.car?.model}
                </p>
                <p className="text-xs text-gray-400">
                  Fecha de creación: {new Date(chatItem.createdDate).toLocaleString()}
                </p>
              </div>
            </li>
          ))}
        </ul>
      )}
    </div>
    </div>
  );
};

export default ChatCards;
