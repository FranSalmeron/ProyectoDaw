import { toast } from 'react-toastify';

const symfonyUrl = import.meta.env.VITE_API_URL;
const token = localStorage.getItem('jwt');

export const createChat = async (sellerId, buyerId, carId) => {
  const body = JSON.stringify({
    buyerId: buyerId,
    sellerId: sellerId,
    carId: carId,
  });

  try {
    // Verificar que el token esté presente
    if (!token) {
      toast.error('No se pudo encontrar el token de autenticación.');
      return null;
    }

    const response = await fetch(`${symfonyUrl}/chat/create`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Authorization': `Bearer ${token}`, // Añadir el token aquí
      },
      body: body,
    });

    if (!response.ok) {
      toast.error("Error al crear el chat");
      return null;
    }

    const data = await response.json();
    if (data.chatId) {
      return data.chatId;
    } else {
      toast.error("No se pudo crear el chat.");
      return null;
    }
  } catch (error) {
    console.error('Error al crear el chat:', error);
    toast.error("Hubo un error al crear el chat.");
    return null;
  }
};

export const deleteChat = async (chatId) => {
  try {

    // Verificar que el token esté presente
    if (!token) {
      toast.error('No se pudo encontrar el token de autenticación.');
      return;
    }

    const response = await fetch(`${symfonyUrl}/chat/${chatId}/delete`, {
      method: 'DELETE',
      headers: {
        'Content-Type': 'application/json',
        'Authorization': `Bearer ${token}`, // Aquí añadimos el token en el encabezado Authorization
      },
    });

    const data = await response.json();

    if (data.success) {
      toast.success('Chat eliminado exitosamente.');
    } else {
      toast.error('Hubo un error al eliminar el chat.');
    }
  } catch (error) {
    console.error('Error al eliminar el chat:', error);
    toast.error('Hubo un error al eliminar el chat.');
  }
};

export const listChats = async (userId) => {
  try {
    // Verificamos si el token está disponible
    if (!token) {
      console.error('No se encontró el token JWT.');
    }
    // Realizamos la solicitud GET a la API para obtener los chats del usuario
    const response = await fetch(`${symfonyUrl}/chat/${userId}/chats`, {
      method: 'GET',
      headers: {
        'Authorization': `Bearer ${token}`, 
        'Content-Type': 'application/json' 
      }
    });
    // Verificamos si la respuesta fue exitosa
    if (!response.ok) {
      console.error('Error al obtener los chats');
    }

    // Parseamos la respuesta JSON
    const data = await response.json();
    
    // Si la respuesta es exitosa, retornamos los chats
    if (data.success) {
      return data.chats;
    } else {
      throw new Error(data.message || 'No se encontraron chats');
    }
  } catch (error) {
    console.error('Error en la función listChats:', error);
    return null; // Retornamos null en caso de error para manejarlos en el componente
  }
};
