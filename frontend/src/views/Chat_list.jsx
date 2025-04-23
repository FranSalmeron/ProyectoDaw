import React, { useEffect, useState } from "react";
import { getChats } from "../helpers/chatHelper";
import ChatCardList from "../components/ChatCards";
import { isAdmin } from "../helpers/decodeToken";
import LoadingSpinner from "../components/LoadingSpinner/LoadingSpinner";

const Chat_list = () => {
  const [chats, setChats] = useState([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    const fetchChats = async () => {
      const data = await getChats();
      if (data) setChats(data);
      setLoading(false);
    };

    fetchChats();
  }, []);

  if (loading) {
    return (
      <div className="flex justify-center items-center">
        <LoadingSpinner /> {/* Usamos un spinner mientras se carga */}
      </div>
    );
  }

  return (
    <div className="bg-[#F5EFEB]">
      <div className="max-w-5xl mx-auto p-6">
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
