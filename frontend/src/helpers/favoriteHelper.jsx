import { toast } from 'react-toastify';

const symfonyUrl = import.meta.env.VITE_API_URL;

// Obtener los favoritos de un usuario específico
export const getFavorites = async (userId, addFavoritesToContext) => {
  try {
    // Revisar favoritos en localStorage, si no, obtenerlos desde la API
    const storedFavorites = JSON.parse(localStorage.getItem(`favorites_${userId}`)) || [];
    
    // Si están en localStorage, añadimos al contexto directamente
    if (storedFavorites.length > 0) {
      addFavoritesToContext(storedFavorites); 
    }
    
    // Si no están en localStorage, llamamos a la API
    const favorites = await fetchFavoritesFromApi(userId);
    localStorage.setItem(`favorites_${userId}`, JSON.stringify(favorites)); // Guardamos en localStorage
    addFavoritesToContext(favorites); // Añadimos al contexto
  } catch (error) {
    console.error('Error al obtener favoritos:', error);
    toast.error('Error al obtener los favoritos.');
  }
};


// Función para obtener los favoritos desde la API de un usuario específico
const fetchFavoritesFromApi = async (userId) => {
  try {
    const response = await fetch(`${symfonyUrl}/favorite/${userId}/favorites`);
    if (!response.ok) {
      throw new Error('No se pudieron obtener los favoritos');
    }

    const data = await response.json();
    if (data.status === 'ok') {
      return data.data;  // Retorna los favoritos del usuario
    } else {
      throw new Error('No se pudieron obtener los favoritos');
    }
  } catch (error) {
    console.error("Error al obtener los favoritos desde la API:", error);
    toast.error('Error al obtener los favoritos desde la API.');
    return [];
  }
};

// Función para añadir un coche a los favoritos
export const addFavorite = async (userId, favorite, addFavoritesToContext) => {
  try {
    const storedFavorites = JSON.parse(localStorage.getItem(`favorites_${userId}`)) || [];
    
    // Si el coche ya está en favoritos, no hacemos nada
    if (storedFavorites.some(fav => fav.id === favorite.id)) {
      toast.info('Este coche ya está en tus favoritos.');
      return;
    }

    // Agregar al array de favoritos y actualizar localStorage
    storedFavorites.push(favorite);
    localStorage.setItem(`favorites_${userId}`, JSON.stringify(storedFavorites));

    // Añadir al contexto y llamar a la API para guardar el favorito
    addFavoritesToContext(favorite);
    await addFavoriteToApi(userId, favorite);
    toast.success('Coche añadido a favoritos');
  } catch (error) {
    console.error('Error al agregar favorito:', error);
    toast.error('Error al agregar coche a favoritos.');
  }
};


// Función para añadir un favorito a la base de datos (API)
const addFavoriteToApi = async (userId, favorite) => {
  try {
    const response = await fetch(`${symfonyUrl}/favorite/new`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        user_id: userId,
        car_id: favorite.car.id, // Asegúrate de que car.id esté disponible y correcto
      }),
    });

    if (!response.ok) {
      throw new Error('No se pudo añadir el coche a favoritos en la base de datos');
    }

    const data = await response.json();
    if (data.status === 'ok') {
      return true;
    } else {
      throw new Error('Error al agregar el favorito en la base de datos');
    }
  } catch (error) {
    console.error('Error al agregar favorito a la base de datos:', error);
    toast.error('No se pudo añadir el coche a favoritos en la base de datos.');
    return false;
  }
};


// Función para eliminar un favorito desde el localStorage y la API
export const removeFavorite = async (userId, favoriteId, removeFavoritesFromContext) => {
  try {
    const storedFavorites = JSON.parse(localStorage.getItem(`favorites_${userId}`)) || [];
    const newFavorites = storedFavorites.filter(fav => fav.id !== favoriteId);

    // Actualizamos localStorage con la nueva lista de favoritos
    localStorage.setItem(`favorites_${userId}`, JSON.stringify(newFavorites));

    // Eliminar del contexto
    removeFavoritesFromContext(favoriteId);
    await removeFavoriteFromApi(favoriteId);
    toast.success('Coche eliminado de favoritos');
  } catch (error) {
    console.error('Error al eliminar favorito:', error);
    toast.error('Error al eliminar coche de favoritos.');
  }
};

// Función para eliminar un favorito desde la base de datos (API)
const removeFavoriteFromApi = async (favoriteId) => {
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
      return true;
    } else {
      throw new Error('Error al eliminar el favorito en la base de datos');
    }
  } catch (error) {
    console.error('Error al eliminar favorito de la base de datos:', error);
    toast.error('No se pudo eliminar el coche de favoritos en la base de datos.');
    return false;
  }
};
