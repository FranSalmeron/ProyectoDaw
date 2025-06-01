import { toast } from "react-toastify";

const symfonyUrl = import.meta.env.VITE_API_URL;
const token = localStorage.getItem('jwt');

/**
 * Función para cargar los mensajes de un chat.
 *
 */
export const loadMessages = async (chatId, setMessages, setLoading) => {
  try {
    const response = await fetch(`${symfonyUrl}/ChatMessage/${chatId}/messages`, {
      method: 'GET',
      headers: {
        'Authorization': `Bearer ${token}`,
        'Content-Type': 'application/json',
      },
    });

    if (!response.ok) {
      toast.error("Error al cargar mensajes.");
      setLoading(false);
      return;
    }

    const data = await response.json();

    if (data.success && Array.isArray(data.messages)) {
      setMessages(data.messages);
    } else {
      toast.error("Respuesta inesperada del servidor.");
    }
  } catch (error) {
    console.error('Error al cargar mensajes:', error);
    toast.error("Error al cargar mensajes.");
  } finally {
    setLoading(false);
  }
};

/**
 * Función para enviar un mensaje en un chat
 * @param {string} chatId - ID del chat
 * @param {string} userId - ID del usuario
 * @param {string} message - Contenido del mensaje
 */
export const sendMessage = async (chatId, userId, message) => {
  try {
    const response = await fetch(`${symfonyUrl}/ChatMessage/${chatId}/send`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        userId: userId,
        message: message,
      }),
    });
    if (!response.ok) {
      return;
    }
  } catch (error) {
    console.error('Error al enviar un mensaje:', error);
    toast.error("Error al enviar el mensaje.");
  }
};
