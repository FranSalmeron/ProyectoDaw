import React, { useEffect, useState } from 'react';
import Login from './Login';

const SOCKET_URL = import.meta.env.VITE_API_WS_URL;

const Chat = () => {
  const [messages, setMessages] = useState([]);
  const [message, setMessage] = useState('');
  const [socket, setSocket] = useState(null);
  const [userId, setUserId] = useState(null);

  const handleLogin = (token) => {
    // Decodificar el token (podrías usar jwt-decode para obtener el userId, pero es solo un ejemplo)
    const decoded = JSON.parse(atob(token.split('.')[1]));
    setUserId(decoded.userId);

    // Crear la conexión WebSocket
    const socketConnection = new WebSocket(`${SOCKET_URL}`);

    socketConnection.onopen = () => {
      console.log('Conectado al servidor WebSocket');

      // Enviar el JWT en la cabecera de la solicitud
      socketConnection.send(JSON.stringify({ type: 'authenticate', token }));
    };

    socketConnection.onmessage = (event) => {
      const newMessage = JSON.parse(event.data);
      if (newMessage.type === 'message') {
        setMessages((prevMessages) => [
          ...prevMessages,
          { user: newMessage.from, content: newMessage.message },
        ]);
      } else if (newMessage.type === 'system') {
        setMessages((prevMessages) => [
          ...prevMessages,
          { user: 'Sistema', content: newMessage.message },
        ]);
      } else if (newMessage.type === 'welcome') {
        setMessages((prevMessages) => [
          ...prevMessages,
          { user: 'Sistema', content: newMessage.message },
        ]);
      }
    };

    socketConnection.onclose = (event) => {
      console.log('Conexión cerrada', event);
    };

    socketConnection.onerror = (error) => {
      console.error('Error en WebSocket:', error);
    };

    setSocket(socketConnection);
  };

  const sendMessage = () => {
    if (socket && message) {
      const msg = {
        type: 'message',  // Tipo de mensaje
        from: userId,     // Usa el ID de usuario
        message: message, // El contenido del mensaje
      };

      try {
        socket.send(JSON.stringify(msg)); // Enviar el mensaje
        setMessage(''); // Limpiar el campo de mensaje después de enviar
      } catch (error) {
        console.error('Error al enviar mensaje:', error);
      }
    }
  };

  const disconnect = () => {
    if (socket) {
      socket.close(); // Cerrar la conexión WebSocket
      console.log('Conexión cerrada manualmente');
    }
  };

  if (!userId) {
    return <Login onLogin={handleLogin} />;
  }

  return (
    <div>
      <h1>Chat en Tiempo Real</h1>
      <div>
        {messages.map((msg, index) => (
          <div key={index}>
            <strong>{msg.user}: </strong>{msg.content}
          </div>
        ))}
      </div>
      <input
        type="text"
        value={message}
        onChange={(e) => setMessage(e.target.value)}
        placeholder="Escribe un mensaje"
      />
      <button onClick={sendMessage}>Enviar</button>
      <button onClick={disconnect}>Abandonar chat</button>
    </div>
  );
};

export default Chat;
