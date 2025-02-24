import React, { useEffect, useState } from 'react';
import Login from './Login';

const SOCKET_URL_WS = import.meta.env.VITE_API_WS_URL;
const SOCKET_URL = import.meta.env.VITE_API_URL

const Chat = () => {
  const [messages, setMessages] = useState([]);
  const [message, setMessage] = useState('');
  const [socket, setSocket] = useState(null);
  const [userId, setUserId] = useState(null);
  const [loading, setLoading] = useState(true);  // Estado de carga para saber si se está validando el token

  useEffect(() => {
    const token = localStorage.getItem('jwt');
    if (token) {
      validateToken(token);
    } else {
      setLoading(false);
    }
  }, []);

  const validateToken = async (token) => {
    try {
      const response = await fetch(`${SOCKET_URL}/api/verify-token`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Authorization': `Bearer ${token}`,
        },
      });

      if (response.ok) {
        const data = await response.json();
        setUserId(data.userId); // El backend debe devolver el userId si el token es válido
        handleLogin(token);
      } else {
        // Si el token no es válido o ha expirado, borrar el token y redirigir al login
        localStorage.removeItem('jwt');
        setLoading(false);
      }
    } catch (error) {
      console.error('Error al verificar el token:', error);
      localStorage.removeItem('jwt');
      setLoading(false);
    }
  };

  const handleLogin = (token) => {
    const decoded = JSON.parse(atob(token.split('.')[1]));
    setUserId(decoded.userId);

    const socketConnection = new WebSocket(`${SOCKET_URL}?token=${token}`);

    socketConnection.onopen = () => {
      console.log('Conectado al servidor WebSocket');
      socketConnection.send(JSON.stringify({ type: 'authenticate', token }));
    };


    socketConnection.onmessage = (event) => {
      const newMessage = JSON.parse(event.data);
      setMessages((prevMessages) => [
        ...prevMessages,
        { user: newMessage.from, content: newMessage.message },
      ]);
    };

    socketConnection.onclose = () => {
      console.log('Conexión cerrada');
    };

    socketConnection.onerror = (error) => {
      console.error('Error en WebSocket:', error);
    };

    setSocket(socketConnection);
  };

  const sendMessage = () => {
    if (socket && message) {
      const msg = {
        type: 'message',
        from: userId,
        message,
      };

      try {
        socket.send(JSON.stringify(msg));
        setMessage('');
      } catch (error) {
        console.error('Error al enviar mensaje:', error);
      }
    }
  };

  const disconnect = () => {
    if (socket) {
      socket.close();
      console.log('Conexión cerrada manualmente');
    }
  };

  if (loading) {
    return <div>Validando token...</div>;
  }

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
