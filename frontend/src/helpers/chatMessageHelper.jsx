import { toast } from "react-toastify";

const symfonyUrl = import.meta.env.VITE_API_URL;

export const loadMessages = async (chatId) => {
  try {
    // Obtener el token JWT del localStorage
    const token = localStorage.getItem('jwt');

    // Verificar que el token esté presente
    if (!token) {
      toast.error('No se pudo encontrar el token de autenticación.');
      return [];
    }

    const response = await fetch(`${symfonyUrl}/ChatMessage/${chatId}/messages`, {
      method: 'GET',
      headers: {
        'Authorization': `Bearer ${token}`, 
      },
    });

    if (!response.ok) {
      toast.error("Error al cargar los mensajes");
      return [];
    }

    const data = await response.json();
    if (data.messages.length === 0) {
      toast.info("No hay mensajes en este chat.");
    }
    return data.messages;
  } catch (error) {
    console.error('Error al cargar los mensajes', error);
    toast.error("Error al cargar los mensajes.");
    return [];
  }
};

export const sendMessage = async (chatId, userId, message) => {
  try {
    // Obtener el token JWT del localStorage
    const token = localStorage.getItem('jwt');

    // Verificar que el token esté presente
    if (!token) {
      toast.error('No se pudo encontrar el token de autenticación.');
      return;
    }

    const response = await fetch(`${symfonyUrl}/ChatMessage/${chatId}/send`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Authorization': `Bearer ${token}`, // Aquí agregamos el token en el encabezado Authorization
      },
      body: JSON.stringify({
        userId: userId,
        message: message,
      }),
    });

    if (!response.ok) {
      toast.error("Error al enviar el mensaje");
      return;
    }
    toast.success("Mensaje enviado");
  } catch (error) {
    console.error('Error al enviar un mensaje:', error);
    toast.error("Error al enviar el mensaje.");
  }
};

