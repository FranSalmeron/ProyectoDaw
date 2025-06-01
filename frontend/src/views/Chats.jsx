import React, { useEffect, useState } from "react";
import { listChats } from "../helpers/chatHelper";
import { useChats } from "../context/ChatContext";
import { toast } from "react-toastify";
import { getUserIdFromToken } from "../helpers/decodeToken";
import { useNavigate } from "react-router-dom";
import LoadingSpinner from "../components/LoadingSpinner/LoadingSpinner";
import { useDarkMode } from "../context/DarkModeContext";

const Chats = ({ userId = null }) => {
  const { chats, addChats } = useChats();
  const [loading, setLoading] = useState(true);
  const [chatDetails, setChatDetails] = useState([]);
  const navigate = useNavigate();
  const { isDarkMode } = useDarkMode();

  useEffect(() => {
    if (userId == null) {
      userId = getUserIdFromToken();
    }
    if (!userId) {
      toast.error("No se pudo obtener el usuario.");
      setLoading(false);
      return;
    }

    const fetchChats = async () => {
      try {
        await listChats(userId, addChats);

        if (chats.length > 0) {
          const detailsWithCars = chats.map((chat) => ({
            chatId: chat.chatId,
            seller: chat.seller || {},
            buyer: chat.buyer || {},
            car: chat.car || {},
            createdDate: chat.createdDate,
          }));
          setChatDetails(detailsWithCars);
        }
      } catch (error) {
        console.error("Error al obtener los chats:", error);
        toast.error("Hubo un error al obtener los chats.");
      } finally {
        setLoading(false);
      }
    };

    fetchChats();
  }, [addChats, chats]);

  const handleChatClick = (chatDetailsItem) => {
    navigate("/chat", {
      state: {
        sellerId: chatDetailsItem.seller?.id,
        carId: chatDetailsItem.car?.id,
        buyerId: chatDetailsItem.buyer?.id,
      },
    });
  };

  // Variables para modo oscuro
  const bgMain = isDarkMode ? "bg-[#1C1C1E] text-white" : "bg-[#F5EFEB] text-black";
  const bgCard = isDarkMode ? "bg-[#2C2C2E]" : "bg-white";
  const borderColor = isDarkMode ? "border-gray-700" : "border-gray-200";
  const textMuted = isDarkMode ? "text-gray-400" : "text-gray-500";
  const textPrimary = isDarkMode ? "text-gray-200" : "text-gray-800";

  if (loading) {
    return (
      <div className={`flex justify-center items-center min-h-screen ${bgMain}`}>
        <LoadingSpinner />
      </div>
    );
  }

  return (
    <div className={`${bgMain} min-h-screen p-5 transition-colors duration-300`}>
      <div className="max-w-3xl mx-auto p-4 rounded-lg">
        <h2 className="text-2xl font-semibold text-center mb-6">Mis Chats</h2>
        {chatDetails.length === 0 ? (
          <p className={`text-center ${textMuted}`}>No tienes chats activos.</p>
        ) : (
          <ul className="space-y-4">
            {chatDetails.map((chatDetailsItem) => (
              <li
                key={chatDetailsItem.chatId}
                className={`flex items-center space-x-4 p-4 ${bgCard} border ${borderColor} rounded-lg shadow-lg hover:shadow-xl transition-all transform hover:scale-105 cursor-pointer`}
                onClick={() => handleChatClick(chatDetailsItem)}
              >
                <div className="w-16 h-16 flex-shrink-0">
                  {chatDetailsItem.car?.images?.[0] ? (
                    <img
                      src={chatDetailsItem.car.images[0]}
                      alt="Car"
                      className="object-cover w-full h-full rounded-full"
                    />
                  ) : (
                    <div className={`flex items-center justify-center rounded-full text-sm text-center ${textMuted} bg-gray-200 dark:bg-gray-700`}>
                      {chatDetailsItem.car?.brand} {chatDetailsItem.car?.model}
                    </div>
                  )}
                </div>

                <div className="flex flex-col justify-between flex-grow">
                  <p className={`text-sm font-semibold ${textPrimary}`}>
                    Vendedor: {chatDetailsItem.seller?.name || "Sin nombre"}
                  </p>
                  <p className={`text-sm ${textMuted}`}>
                    Comprador interesado: {chatDetailsItem.buyer?.name || "Sin nombre"}
                  </p>
                  <p className={`text-sm ${textPrimary}`}>
                    Marca/Modelo: {chatDetailsItem.car?.brand} {chatDetailsItem.car?.model}
                  </p>
                  <p className={`text-xs ${textMuted}`}>
                    Fecha de creación: {new Date(chatDetailsItem.createdDate).toLocaleString()}
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

export default Chats;
