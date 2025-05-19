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
    <div className={`${bgMain} min-h-screen transition-colors duration-300`}>
      <div className={`max-w-5xl mx-auto mt-10 mb-10 p-6 rounded-lg shadow-md border ${bgCard} ${borderStyle}`}>
        {isAdmin() ? (
          <>
            <h1 className="text-3xl font-bold mb-6">Lista de Chats</h1>
            {chats.length === 0 ? (
              <p>No hay chats disponibles.</p>
            ) : (
              <ChatCardList chats={chats} />
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