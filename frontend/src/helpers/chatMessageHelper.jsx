import { toast } from "react-toastify";

const symfonyUrl = import.meta.env.VITE_API_URL;
const token = localStorage.getItem('jwt');

/**
 * Función para cargar los mensajes de un chat de manera asíncrona
 * @param {string} chatId - ID del chat
 * @returns {Array} Lista de mensajes
 */
export const loadMessages = async (chatId, setLoading, taskId = null) => {
  console.log("Cargando mensajes...");

  try {
    const response = await fetch(`${symfonyUrl}/ChatMessage/${chatId}/messages`, {
      method: 'Post',
      headers: {
        'Content-Type': 'application/json',
        'Authorization': `Bearer ${token}`,
      },
      body: JSON.stringify(taskId),
    });
    
    if (!response.ok) {
      toast.error("Error al cargar mensajes.");
      setLoading(false);
      return null;
    }

    const data = await response.json();

    if (data.status === 'Message dispatched') {
      return data.taskId; // Retornar el taskId para el polling
    } else {
      toast.error("Error desconocido al cargar mensajes.");
      setLoading(false);
      return null;
    }
  } catch (error) {
    console.error('Error al cargar mensajes', error);
    toast.error("Error al cargar mensajes.");
    setLoading(false);
    return null;
  }
};


/**
 * Función para hacer polling y verificar el estado de la tarea
 * @param {string} taskId - ID de la tarea
 */
export const pollTaskStatus = async (taskId, setMessages, setLoading, existingMessages) => {

  try {
    const response = await fetch(`${symfonyUrl}/ChatMessage/task/${taskId}`, {
      method: 'GET',
      headers: {
        'Content-Type': 'application/json',
      },
    });

    const data = await response.json();

    if (data.status === 'completed') {
      if (Array.isArray(data.data)) {
        const newMessages = data.data;

        // Comparar mensajes para ver si hay nuevos
        const hasNewMessages = newMessages.length !== existingMessages.length ||
          newMessages.some((message, index) => message.messageId !== existingMessages[index]?.messageId);

        if (hasNewMessages) {
          // Si hay nuevos mensajes, actualizar el estado
          setMessages(newMessages);
        }
      } else {
        toast.error("Error al cargar los mensajes: formato incorrecto.");
      }
      setLoading(false);
    }
  } catch (error) {
    console.error('Error al verificar estado de la tarea', error);
    toast.error("Error al verificar el estado de la tarea.");
  }
};


/**
 * Función para enviar un mensaje en un chat
 * @param {string} chatId - ID del chat
 * @param {string} userId - ID del usuario
 * @param {string} message - Contenido del mensaje
 */
export const sendMessage = async (chatId, userId, message, taskId) => {
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
