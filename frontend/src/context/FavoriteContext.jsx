import { createContext, useContext, useState } from "react";
import { toast } from "react-toastify";

// creamos el contexto.
const favoriteContext = createContext();

export function FavoriteProvider({ children }) {
  const [favorites, setfavorites] = useState([]); 

  const addFavorites = (newfavorite) => {
    // Verififavorite si el favorite ya está en el estado
    if (favorites.some((p) => p?.id === newfavorite.id)) {
      return;
    }
    // Añadir el nuevo favorite al estado
    setfavorites((prevfavorites) => [...prevfavorites, newfavorite]);
  };

  const removeFromData = (favoriteId) => {
    setfavorites((prevfavorites) => prevfavorites.filter((p) => p?.id !== favoriteId));
    toast.info("favorite eliminado de la data", {
      style: {
        background: "blue",
        color: "white",
        border: "1px solid black",
      },
      icon: "🗑️",
    });
  };

  return (
    <favoriteContext.Provider value={{ favorites, addFavorites, removeFromData }}>
      {children}
    </favoriteContext.Provider>
  );
}

//// ------------ Hook para consumir el contexto ------------
export const useFavorites = () => {
  const context = useContext(favoriteContext);
  if (context === undefined) {
    throw new Error("usefavorite debe ser usado dentro de un favoriteProvider");
  }
  return context;
};
