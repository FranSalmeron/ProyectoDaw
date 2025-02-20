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

    socketConnection.onclose = (event) => {
      console.log('Conexión cerrada', event);
      // Si se cierra la conexión, podrías intentar reconectar aquí.
    };
    
    socketConnection.onerror = (error) => {
      console.error('Error en WebSocket:', error);
    };
    
    setSocket(socketConnection);

    // No cerramos la conexión automáticamente cuando el componente se desmonta

    return () => {
      // Este return ahora no cierra la conexión
      // solo se cierra cuando el usuario hace clic en "Abandonar"
    };
  }, []);  // Este useEffect solo se ejecuta una vez cuando el componente se monta

  const userId = 'user-123'; // Reemplaza esto por un identificador único del usuario

  const sendMessage = () => {
    if (socket && message) {
      const msg = {
        type: 'message',  // Tipo de mensaje
        from: userId,     // Usa un identificador de usuario estático
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
    // Función para cerrar la conexión WebSocket manualmente
    const disconnect = () => {
      if (socket) {
        socket.close(); // Cerrar la conexión WebSocket
        console.log('Conexión cerrada manualmente');
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

        {/* Botón para cerrar la conexión WebSocket */}
        <button onClick={disconnect}>Abandonar chat</button>
      </div>
    );
  };

  export default Chat;
