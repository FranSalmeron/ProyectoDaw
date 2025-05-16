import React from "react";
import { useNavigate } from "react-router-dom";
import { useDarkMode } from "../context/DarkModeContext"; // Importa el contexto correctamente

const ChatCards = ({ chats }) => {
  const navigate = useNavigate();
  const { isDarkMode } = useDarkMode(); // Obtén el estado

  // Clases condicionales para modo oscuro
  const bgMain = isDarkMode ? "bg-[#1C1C1E] text-white" : "bg-[#F5EFEB] text-black";
  const bgCard = isDarkMode ? "bg-[#2C2C2E] border-gray-700" : "bg-white border-gray-200";
  const textPrimary = isDarkMode ? "text-white" : "text-gray-800";
  const textSecondary = isDarkMode ? "text-gray-400" : "text-gray-500";
  const textTertiary = isDarkMode ? "text-gray-300" : "text-gray-700";
  const textQuaternary = isDarkMode ? "text-gray-500" : "text-gray-400";
  const bgPlaceholder = isDarkMode ? "bg-gray-700 text-gray-300" : "bg-gray-200 text-gray-700";

  const handleOpenChat = (chat) => {
    navigate("/chat", {
      state: {
        sellerId: chat.seller.id,
        carId: chat.car.id,
        buyerId: chat.buyer.id,
      },
    });
  };

  return (
    <div className={`${bgMain} min-h-screen p-5`}>
      <div className="max-w-3xl mx-auto p-4">
        {chats.length === 0 ? (
          <p className={`${textSecondary} text-center`}>No existen chats.</p>
        ) : (
          <ul className="space-y-4">
            {chats.map((chatItem) => (
              <li
                key={chatItem.chatId}
                className={`${bgCard} flex items-center space-x-4 p-4 border rounded-lg shadow hover:shadow-lg transition-shadow cursor-pointer`}
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
                    <div className={`${bgPlaceholder} flex items-center justify-center rounded-full text-sm text-center`}>
                      {chatItem.car?.brand} {chatItem.car?.model}
                    </div>
                  )}
                </div>

                {/* Detalles del chat */}
                <div className="flex flex-col justify-between flex-grow">
                  <p className={`${textPrimary} text-sm font-semibold`}>
                    Vendedor: {chatItem.seller?.name || "Sin nombre"}
                  </p>
                  <p className={`${textSecondary} text-sm`}>
                    Comprador interesado: {chatItem.buyer?.name || "Sin nombre"}
                  </p>
                  <p className={`${textTertiary} text-sm`}>
                    Marca/Modelo: {chatItem.car?.brand} {chatItem.car?.model}
                  </p>
                  <p className={`${textQuaternary} text-xs`}>
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