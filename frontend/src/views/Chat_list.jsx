import React, { useEffect, useState } from "react";
import { getChats } from "../helpers/chatHelper";
import ChatCardList from "../components/ChatCards";
import { isAdmin } from "../helpers/decodeToken";
import LoadingSpinner from "../components/LoadingSpinner/LoadingSpinner";
import { useDarkMode } from "../context/DarkModeContext";

const Chat_list = () => {
  const [chats, setChats] = useState([]);
  const [loading, setLoading] = useState(true);
  const { isDarkMode } = useDarkMode();

  useEffect(() => {
    const fetchChats = async () => {
      const data = await getChats();
      if (data) setChats(data);
      setLoading(false);
    };

    fetchChats();
  }, []);

  const bgMain = isDarkMode ? "bg-[#2C2C2E] text-white" : "bg-white text-black";
  const bgCard = isDarkMode ? "bg-[#1C1C1E]" : "bg-[#F5EFEB]";
  const borderStyle = isDarkMode ? "border-gray-700" : "border-gray-300";

  if (loading) {
    return (
      <div className={`flex justify-center items-center min-h-screen ${bgMain}`}>
        <LoadingSpinner />
      </div>
    );
  }

  return (
    <div className={`${bgMain} min-h-screen transition-colors duration-300 pt-6 pb-6`}>
      <div className={`max-w-6xl mx-auto p-6 rounded-lg shadow-md border ${bgCard} ${borderStyle}`}>
        {isAdmin() ? (
          <>
            <h1 className="text-3xl font-bold mb-6">Lista de Chats</h1>
            {chats.length === 0 ? (
              <p>No hay chats disponibles.</p>
            ) : (
              <ul className="space-y-4">
                {chats.map((chat) => (
                  <li
                    key={chat.chatId}
                    className={`flex items-center space-x-4 p-4 ${bgCard} border ${borderStyle} rounded-lg shadow-lg hover:shadow-xl transition-all transform hover:scale-105 cursor-pointer`}
                  >
                    <div className="w-16 h-16 flex-shrink-0">
                      {/* Imagen del coche o nombre */}
                      {chat.car?.images?.[0] ? (
                        <img
                          src={chat.car.images[0]}
                          alt="Car"
                          className="object-cover w-full h-full rounded-full"
                        />
                      ) : (
                        <div className={`flex items-center justify-center rounded-full text-sm text-center text-muted bg-gray-200 dark:bg-gray-700`}>
                          {chat.car?.brand} {chat.car?.model}
                        </div>
                      )}
                    </div>

                    <div className="flex flex-col justify-between flex-grow">
                      <p className={`text-sm font-semibold text-primary`}>
                        Vendedor: {chat.seller?.name || "Sin nombre"}
                      </p>
                      <p className={`text-sm text-muted`}>
                        Comprador: {chat.buyer?.name || "Sin nombre"}
                      </p>
                      <p className={`text-sm text-primary`}>
                        Marca/Modelo: {chat.car?.brand} {chat.car?.model}
                      </p>
                      <p className={`text-xs text-muted`}>
                        Fecha de creación: {new Date(chat.createdDate).toLocaleString()}
                      </p>
                    </div>
                  </li>
                ))}
              </ul>
            )}
          </>
        ) : (
          <p>No eres administrador, no puedes ver los chats.</p>
        )}
      </div>
    </div>
  );
};

export default Chat_list;
