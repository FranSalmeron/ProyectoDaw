import React, { useEffect, useState } from 'react';

const SOCKET_URL = import.meta.env.VITE_API_WS_URL;

const Chat = () => {
  const [messages, setMessages] = useState([]);
  const [message, setMessage] = useState('');
  const [socket, setSocket] = useState(null);

  useEffect(() => {
    // Crear la conexión WebSocket
    const socketConnection = new WebSocket(`${SOCKET_URL}`);

    socketConnection.onopen = () => {
      console.log('Conectado al servidor WebSocket');
    };

    socketConnection.onmessage = (event) => {
      const newMessage = JSON.parse(event.data);
      // Solo agregar los mensajes de tipo 'message' al estado
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

    socketConnection.onclose = () => {
      console.log('Conexión cerrada');
    };

    setSocket(socketConnection);

    // Cleanup al cerrar el componente
    return () => {
      socketConnection.close();
    };
  }, []);

  const sendMessage = () => {
    if (socket && message) {
      const msg = {
        type: 'message',
        from: `Usuario ${Math.floor(Math.random() * 1000)}`,  // Simula un ID de usuario único
        message, // El contenido del mensaje
      };
      socket.send(JSON.stringify(msg));
      setMessage(''); // Limpiar el campo del mensaje
    }
  };

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
    </div>
  );
};

export default Chat;
