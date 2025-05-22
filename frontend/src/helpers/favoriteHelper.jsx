import { toast } from 'react-toastify';

const symfonyUrl = import.meta.env.VITE_API_URL;

// Obtener los favoritos de un usuario específico
export const getFavorites = async (userId, addFavoritesToContext) => {
  try {
    console.log(userId);
    // Revisar favoritos en localStorage, si no, obtenerlos desde la API
    const storedFavorites = JSON.parse(localStorage.getItem(`favorites_${userId}`)) || [];
    
    // Si están en localStorage, añadimos al contexto directamente
    if (storedFavorites.length > 0) {
      storedFavorites.forEach(favorite => {
      addFavoritesToContext(favorite); 
      });
      return; // Salimos si ya están en localStorage
    }
    // Si no están en localStorage, llamamos a la API
    const favorites = await fetchFavoritesFromApi(userId);
    localStorage.setItem(`favorites_${userId}`, JSON.stringify(favorites)); // Guardamos en localStorage
    favorites.forEach(favorite => {
    addFavoritesToContext(favorite); // Añadimos al contexto
    });
  } catch (error) {
    console.error('Error al obtener favoritos:', error);
    addFavoritesToContext([]); // En caso de error, pasamos un array vacío al contexto
  }
};


// Función para obtener los favoritos desde la API de un usuario específico
const fetchFavoritesFromApi = async (userId, addFavoritesToContext) => {
  try {
    const response = await fetch(`${symfonyUrl}/favorite/${userId}/favorites`);
    if (!response.ok) {
      throw new Error('No se pudieron obtener los favoritos');
    }

    const data = await response.json();
    if (data.status === 'ok') {
      localStorage.setItem(`favorites_${userId}`, JSON.stringify(data.data)); // Guardamos los favoritos en localStorage
      addFavoritesToContext(data.data); // Añadimos los favoritos al contexto
      return data.data;  // Retorna los favoritos del usuario
    } else {
      throw new Error('No se pudieron obtener los favoritos');
    }
  } catch (error) {
    console.error("Error al obtener los favoritos desde la API:", error);
    return [];
  }
};

// Función para añadir un coche a los favoritos
export const addFavorite = async (userId, favorite, addFavoritesToContext) => {
  try {
    const response = await fetch(`${symfonyUrl}/favorite/new`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        user_id: userId,
        car_id: favorite,
      }),
    });

    if (!response.ok) {
      throw new Error('No se pudo añadir el coche a favoritos en la base de datos');
    }

    const data = await response.json();
    if (data.status === 'ok') {
      addFavoritesToContext(data.data[0]); // Llamar a la función para añadir el favorito al contexto
      const currentFavorites = JSON.parse(localStorage.getItem( `favorites_${userId}`)) || [];

      // Agregar el nuevo favorito a la lista
      const updatedFavorites = [...currentFavorites, data.data[0]];

      // Guardar la lista actualizada en localStorage
      localStorage.setItem(`favorites_${userId}`, JSON.stringify(updatedFavorites));

      return true;
    }
  } catch (error) {
    return false;
  }
};

// Función para eliminar un favorito desde el localStorage y la API
export const removeFavorite = async (userId, favoriteId, removeFromData) => {
  try {
    // Enviamos una solicitud DELETE a la API para eliminar el favorito usando el id del favorito
    const response = await fetch(`${symfonyUrl}/favorite/${favoriteId}/delete`, {
      method: 'DELETE',
    });

    if (!response.ok) {
      throw new Error('No se pudo eliminar el coche de favoritos en la base de datos');
    }

    const data = await response.json();
    if (data.status === 'ok') {
      removeFromData(favoriteId); // Llamar a la función para eliminar el favorito del contexto
      // Eliminar el favorito de localStorage
      const currentFavorites = JSON.parse(localStorage.getItem(`favorites_${userId}`)) || [];

      // Filtrar el favorito que queremos eliminar
      const updatedFavorites = currentFavorites.filter(favorite => favorite.id !== favoriteId);

      // Guardar la lista actualizada de favoritos en localStorage
      localStorage.setItem(`favorites_${userId}`, JSON.stringify(updatedFavorites));
      return true;
    } else {
      throw new Error('Error al eliminar el favorito en la base de datos');
    }
  } catch (error) {
    console.error('Error al eliminar favorito de la base de datos:', error);
    return false;
  }
};

    
