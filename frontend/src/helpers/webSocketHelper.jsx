let socket = null;
const WS_SERVER_URL = import.meta.env.VITE_WS_URL

export const connectToWebSocket = (chatId, userId, onMessageReceived) => {
  if (socket) {
    socket.close();
  }

  socket = new WebSocket(`${WS_SERVER_URL}/ws?chatId=${chatId}`);

  socket.onopen = () => {
    console.log(`✅ Conectado al WebSocket del chat ${chatId}`);
  };

  socket.onmessage = (event) => {
    try {
      const data = JSON.parse(event.data);
      // Verifica que sea del mismo chat
      if (data.chatId == chatId) {
        onMessageReceived(data);
      }
    } catch (error) {
      console.error("Error al parsear mensaje WebSocket:", error);
    }
  };

  socket.onclose = () => {
    console.warn("🔌 Conexión WebSocket cerrada");
  };

  socket.onerror = (error) => {
    console.error("❌ Error en WebSocket:", error);
  };
};

export const sendMessageWS = (chatId, userId, message) => {
  if (socket && socket.readyState === WebSocket.OPEN) {
    socket.send(JSON.stringify({
      chatId,
      userId,
      message,
    }));
  } else {
    console.warn("⚠️ WebSocket no está conectado.");
  }
};

export const closeWebSocket = () => {
  if (socket) {
    socket.close();
    socket = null;
  }
};
