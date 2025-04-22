import { toast } from "react-toastify";

const symfonyUrl = import.meta.env.VITE_API_URL;
const token = localStorage.getItem("jwt");

export const createChat = async (sellerId, buyerId, carId) => {
  const body = JSON.stringify({
    buyerId: buyerId,
    sellerId: sellerId,
    carId: carId,
  });

  try {
    // Verificar que el token esté presente
    if (!token) {
      toast.error("No se pudo encontrar el token de autenticación.");
      return null;
    }

    const response = await fetch(`${symfonyUrl}/chat/create`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        Authorization: `Bearer ${token}`,
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
      toast.error("No se pudo entrar al chat, intentalo de nuevo.");
      return null;
    }
  } catch (error) {
    console.error("Error al crear el chat:", error);
    toast.error("Hubo un error al crear el chat.");
    return null;
  }
};

export const deleteChat = async (chatId) => {
  try {
    // Verificar que el token esté presente
    if (!token) {
      toast.error("No se pudo encontrar el token de autenticación.");
      return;
    }

    const response = await fetch(`${symfonyUrl}/chat/${chatId}/delete`, {
      method: "DELETE",
      headers: {
        "Content-Type": "application/json",
        Authorization: `Bearer ${token}`, // Aquí añadimos el token en el encabezado Authorization
      },
    });

    const data = await response.json();

    if (data.success) {
      toast.success("Chat eliminado exitosamente.");
    } else {
      toast.error("Hubo un error al eliminar el chat.");
    }
  } catch (error) {
    console.error("Error al eliminar el chat:", error);
    toast.error("Hubo un error al eliminar el chat.");
  }
};

export const listChats = async (userId, addChats) => {
  console.log("Cargando chats...");
  try {
    // Primero, revisamos si hay datos en el localStorage
    const storedChats = localStorage.getItem("cachedChats");
    const now = new Date();
    const thirtyMinutes = 30 * 60 * 1000; // 30 minutos en milisegundos

    // Si existe cachedChats en localStorage
    if (storedChats) {
      const { chats, lastUpdated } = JSON.parse(storedChats); // Desestructuramos el objeto

      // Verificamos si los datos son válidos y si no ha pasado el tiempo de expiración
      if (now - new Date(lastUpdated) < thirtyMinutes) {
        chats.forEach((chat) => addChats(chat)); // Agregamos los chats desde localStorage
      } else {
        // Si han pasado más de 30 minutos, necesitamos actualizar los datos
        console.log("La caché ha caducado. Actualizando chats...");
        await fetchAndStoreChats(userId, addChats); // Actualizamos los chats
      }
    } else {
      // Si no hay datos en localStorage, hacemos la petición a la API
      await fetchAndStoreChats(userId, addChats);
    }
  } catch (error) {
    console.error("Error al obtener los chats: ", error);
  }
};

// Función para hacer la petición y almacenar los chats junto con el timestamp
const fetchAndStoreChats = async (userId, addChats) => {
  try {
    const response = await fetch(`${symfonyUrl}/chat/${userId}/chats`, {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
      },
    });

    if (!response.ok) {
      throw new Error("Error fetching chats");
    }

    const data = await response.json();

    if (Array.isArray(data.chats) && data.chats.length > 0) {
      // Guardamos los chats en localStorage con el timestamp de la última actualización
      const newData = {
        chats: data.chats,
        lastUpdated: new Date().toISOString(), // Guardamos la fecha actual
      };
      localStorage.setItem("cachedChats", JSON.stringify(newData));
      data.chats.forEach((chat) => addChats(chat)); // Actualizamos los chats en el estado global
    } else {
      console.error(
        "No hay chats disponibles o la respuesta no es un array válido"
      );
    }
  } catch (error) {
    console.error("Error al obtener los chats: ", error);
  }
};

export const getChats = async () => {
  try {
    const response = await fetch(`${symfonyUrl}/chat/index`, {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
        Authorization: `Bearer ${token}`,
      },
    });
    if (!response.ok) {
      throw new Error("Error fetching chats");
    }
    const data = await response.json();
    return data.chats;
  } catch (error) {
    console.error("Error al obtener los chats: ", error);
    toast.error("Hubo un error al obtener los chats.");
  }
};
