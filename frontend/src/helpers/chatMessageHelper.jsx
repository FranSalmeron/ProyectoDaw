import { toast } from "react-toastify";

const symfonyUrl = import.meta.env.VITE_API_URL;
const token = localStorage.getItem('jwt');

/**
 * Función para cargar los mensajes de un chat
 * @param {string} chatId - ID del chat
 * @returns {Array} Lista de mensajes
 */
export const loadMessages = async (chatId) => {
  try {
    const response = await fetch(`${symfonyUrl}/ChatMessage/${chatId}/messages`, {
      method: 'GET',
      headers: {
        'Content-Type': 'application/json'
      }
    });

    if (!response.ok) {
      toast.error("Error al cargar los mensajes");
      return [];
    }

    const data = await response.json();
    if (!data || data.length === 0) {
      toast.info("No hay mensajes en este chat.");
    }
    return data || [];
  } catch (error) {
    console.error('Error al cargar los mensajes', error);
    toast.error("Error al cargar los mensajes.");
    return [];
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
      toast.error("Error al enviar el mensaje");
      return;
    }
    toast.success("Mensaje enviado");
  } catch (error) {
    console.error('Error al enviar un mensaje:', error);
    toast.error("Error al enviar el mensaje.");
  }
};


