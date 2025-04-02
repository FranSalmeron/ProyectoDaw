import { toast } from 'react-toastify';

const symfonyUrl = import.meta.env.VITE_API_URL;

// Obtener los favoritos de un usuario específico
export const getFavorites = async (userId, addFavoritesToContext) => {
  try {
    // Primero revisamos si los favoritos están almacenados en localStorage
    const storedFavorites = localStorage.getItem(`favorites_${userId}`);
    
    // Si hay favoritos en localStorage, los usamos
    if (storedFavorites) {
      const favorites = JSON.parse(storedFavorites);
      favorites.forEach(favorite => addFavoritesToContext(favorite));  // Añadimos los favoritos al contexto
      return favorites;  // Retornamos los favoritos del localStorage
    } else {
      // Si no están en localStorage, llamamos a la API para obtenerlos
      console.log('No hay favoritos en localStorage. Llamando a la API...');
      const favorites = await fetchFavoritesFromApi(userId);
      // Al recibir los favoritos, los almacenamos en localStorage
      localStorage.setItem(`favorites_${userId}`, JSON.stringify(favorites));
      favorites.forEach(favorite => addFavoritesToContext(favorite));  // Añadimos los favoritos al contexto
      return favorites;  // Retornamos los favoritos obtenidos de la API
    }
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
    // Obtenemos los favoritos actuales desde localStorage
    const storedFavorites = JSON.parse(localStorage.getItem(`favorites_${userId}`)) || [];

    // Verificamos si el coche ya está en los favoritos
    if (storedFavorites.some(fav => fav.id === favorite.id)) {
      toast.info('Este coche ya está en tus favoritos.');
      return;
    }

    // Si no está en favoritos, lo agregamos
    storedFavorites.push(favorite);
    localStorage.setItem(`favorites_${userId}`, JSON.stringify(storedFavorites));

    // Añadimos el nuevo favorito al contexto
    addFavoritesToContext(favorite);

    // Llamamos a la API para agregar el favorito en el servidor
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
    const response = await fetch(`${symfonyUrl}/favorite/${userId}/new`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(favorite),
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
export const removeFavorite = async (userId, carId, removeFavoriteFromContext) => {
  try {
    const storedFavorites = JSON.parse(localStorage.getItem(`favorites_${userId}`)) || [];
    const updatedFavorites = storedFavorites.filter(fav => fav.id !== favoriteId);

    // Actualizamos el localStorage con los nuevos favoritos
    localStorage.setItem(`favorites_${userId}`, JSON.stringify(updatedFavorites));

    // Eliminamos el favorito del contexto
    removeFavoriteFromContext(favoriteId);

    // Llamamos a la API para eliminar el favorito en el servidor
    await removeFavoriteFromApi(userId, favoriteId);

    toast.info('Coche eliminado de favoritos');
  } catch (error) {
    console.error('Error al eliminar favorito:', error);
    toast.error('Error al eliminar coche de favoritos.');
  }
};

// Función para eliminar un favorito desde la base de datos (API)
const removeFavoriteFromApi = async (userId, carId) => {
  try {
    const response = await fetch(`${symfonyUrl}/favorite/${userId}/${carId}`, {
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
