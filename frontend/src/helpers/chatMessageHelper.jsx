import { toast } from "react-toastify";

const symfonyUrl = import.meta.env.VITE_API_URL;
const token = localStorage.getItem('jwt');

/**
 * Función para cargar los mensajes de un chat de manera asíncrona
 * @param {string} chatId - ID del chat
 * @returns {Array} Lista de mensajes
 */
export const loadMessages = async (chatId, setMessages, setLoading) => {
  try {
    const response = await fetch(`${symfonyUrl}/ChatMessage/${chatId}/messages`, {
      method: 'GET',
      headers: {
        'Content-Type': 'application/json',
        'Authorization': `Bearer ${token}`, // Si es necesario incluir token
      }
    });

    if (!response.ok) {
      toast.error("Error al iniciar carga de mensajes");
      setLoading(false);
      return [];
    }

    const data = await response.json();
    if (data.status == 'Message dispatched') {
      toast.info("Carga de mensajes iniciada.");
      return { taskId: data.taskId }; // Retorna taskId
    }
  } catch (error) {
    console.error('Error al iniciar carga de mensajes', error);
    toast.error("Error al iniciar carga de mensajes.");
    setLoading(false);
  }
};

/**
 * Función para hacer polling y verificar el estado de la tarea
 * @param {string} taskId - ID de la tarea
 */
const pollTaskStatus = (taskId, setMessages, setLoading) => {
  const interval = setInterval(async () => {
    try {
      const response = await fetch(`${import.meta.env.VITE_API_URL}/ChatMessage/task/${taskId}`, {
        method: 'GET',
        headers: {
          'Content-Type': 'application/json',
        },
      });

      const data = await response.json();
      if (data.status == 'completed') {
        if (Array.isArray(data.data)) {
          setMessages(data.data); // Asignar los mensajes cuando estén listos
        } else {
          toast.error("Error al cargar los mensajes: formato incorrecto.");
        }
        clearInterval(interval); // Detener el polling
        setLoading(false); // Finalizar la carga
      } else {
        console.log('Tarea aún pendiente...');
      }
    } catch (error) {
      console.error('Error al verificar estado de la tarea', error);
      clearInterval(interval);
      toast.error("Error al verificar el estado de la tarea.");
    }
  }, 2000); // Polling cada 2 segundos
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
