import { createContext, useContext, useState } from "react";
import { toast } from "react-toastify";

// Creamos el contexto
const favoriteContext = createContext();

export function FavoriteProvider({ children }) {
  const [favorites, setFavorites] = useState([]); // Mantenemos un solo array plano

  const addFavorites = (newFavorite) => {
      // Verificamos si el coche ya está en favoritos
      if (favorites.some((p) => p?.car?.id === newFavorite.car.id)) {
        return; // Si ya está en favoritos, no hacemos nada
      }
    
      // Añadimos el nuevo favorito al array, asegurándonos de agregar un único objeto
      setFavorites((prevFavorites) => [...prevFavorites, newFavorite]);    
  };

  const removeFromData = (favoriteId) => {
    // Filtramos el array para eliminar el favorito
    setFavorites((prevFavorites) => prevFavorites.filter((p) => p?.id !== favoriteId));
  };

  const clearFavorites = () => setFavorites([]);
  
  return (
    <favoriteContext.Provider value={{ favorites, addFavorites, removeFromData, clearFavorites }}>
      {children}
    </favoriteContext.Provider>
  );
}

// Hook para consumir el contexto
export const useFavorites = () => {
  const context = useContext(favoriteContext);
  if (context === undefined) {
    throw new Error("useFavorites debe ser usado dentro de un FavoriteProvider");
  }
  return context;
};
