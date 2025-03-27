import { createContext, useContext, useState } from "react";
import { toast } from "react-toastify";

// creamos el contexto.
const chatContext = createContext();

export function ChatProvider({ children }) {
  const [chats, setchats] = useState([]); 

  const addChats = (newchat) => {
    // Verifichat si el chat ya está en el estado
    if (chats.some((p) => p?.id === newchat.id)) {
      return;
    }
    // Añadir el nuevo chat al estado
    setchats((prevchats) => [...prevchats, newchat]);
  };

  const removeFromData = (chatId) => {
    setchats((prevchats) => prevchats.filter((p) => p?.id !== chatId));
    toast.info("chat eliminado de la data", {
      style: {
        background: "blue",
        color: "white",
        border: "1px solid black",
      },
      icon: "🗑️",
    });
  };

  return (
    <chatContext.Provider value={{ chats, addChats, removeFromData }}>
      {children}
    </chatContext.Provider>
  );
}

//// ------------ Hook para consumir el contexto ------------
export const useChats = () => {
  const context = useContext(chatContext);
  if (context === undefined) {
    throw new Error("usechat debe ser usado dentro de un chatProvider");
  }
  return context;
};
