import React, { useEffect, useState } from "react";
import { getChats } from "../helpers/chatHelper";
import ChatCards from "../components/ChatCards"; // Importar ChatCards
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

  const bgMain = isDarkMode ? "bg-[#2C2C2E] text-white" : "bg-[#1C1C1E] text-black";

  if (loading) {
    return (
      <div className={`flex justify-center items-center min-h-screen ${bgMain}`}>
        <LoadingSpinner />
      </div>
    );
  }

  return (
    <div className={`${bgMain} min-h-screen transition-colors duration-300 pt-6 pb-6`}>
      <div className="max-w-6xl mx-auto p-6">
        {isAdmin() ? (
          <>
            <h1 className="text-3xl font-bold mb-6">Lista de Chats</h1>
            {/* Aquí usamos ChatCards y pasamos los chats como prop */}
            <ChatCards chats={chats} />
          </>
        ) : (
          <p>No eres administrador, no puedes ver los chats.</p>
        )}
      </div>
    </div>
  );
};

export default Chat_list;
