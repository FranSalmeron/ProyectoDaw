import React, { useEffect, useState } from 'react';
import Login from './Login';

const SOCKET_URL_WS = import.meta.env.VITE_API_WS_URL;
const SOCKET_URL = import.meta.env.VITE_API_URL;

const Chat = () => {
  const [messages, setMessages] = useState([]);
  const [message, setMessage] = useState('');
  const [socket, setSocket] = useState(null);
  const [userId, setUserId] = useState(null);
  const [loading, setLoading] = useState(true);  // Estado de carga para saber si se está validando el token

  useEffect(() => {
    const token = localStorage.getItem('jwt'); 
    if (token) {
      validateToken(token);  // Validar el token cuando se carga el componente
    } else {
      setLoading(false);  // Si no hay token, dejamos de cargar
    }
  }, []);

  // Función para validar el token JWT
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
        setUserId(data.userId); 
        console.log("Token válido, id usuario:", data.userId);
        handleLogin();  // Manejar la conexión al WebSocket y abrir el chat
      } else {
        const errorData = await response.json();
        console.error("Error en la validación del token:", errorData.error);
        localStorage.removeItem('jwt');
        setLoading(false);
      }
    } catch (error) {
      console.error('Error al verificar el token:', error);
      localStorage.removeItem('jwt');
      setLoading(false);
    }
  };

  // Función para manejar el login y abrir la conexión WebSocket
  const handleLogin = () => {
    try {
      // Crea una nueva conexión WebSocket
      const socketConnection = new WebSocket(SOCKET_URL_WS); 

      socketConnection.onopen = () => {
          console.log("Conectado al servidor WebSocket");
      };

      socketConnection.onmessage = (event) => {
        const receivedMessage = JSON.parse(event.data);
        if (receivedMessage.type === 'message') {
          // Agregar el nuevo mensaje al estado de mensajes
          setMessages(prevMessages => [...prevMessages, { user: receivedMessage.from, content: receivedMessage.message }]);
        }
      };
    

      socketConnection.onerror = (error) => {
          console.error("Error en WebSocket:", error);
      };

      socketConnection.onclose = (event) => {
          if (event.wasClean) {
              console.log(`Conexión cerrada de forma limpia con código ${event.code}`);
          } else {
              console.error(`Conexión cerrada con error`);
          }
      };

      
      setSocket(socketConnection);
      setLoading(false); 
    } catch (error) {
      console.error('Error al manejar el login o la conexión WebSocket', error);
      setLoading(false);  // No importa si falla la conexión, dejamos de cargar
    }
  };

  // Función para enviar un mensaje
  const sendMessage = () => {
    if (socket && message) {
      const msg = {
        type: 'message',
        from: userId,
        message,
      };

      try {
        socket.send(JSON.stringify(msg));  // Enviar el mensaje por WebSocket
        setMessage('');
      } catch (error) {
        console.error('Error al enviar mensaje:', error);
      }
    }
  };

  // Función para desconectar la conexión WebSocket
  const disconnect = () => {
    if (socket) {
      socket.close();  // Cerrar la conexión WebSocket
      console.log('Conexión cerrada manualmente');
    }
  };

  if (loading) {
    return <div>Validando token...</div>;  // Mostrar pantalla de carga mientras se valida el token
  }

  if (!userId) {
    return <Login onLogin={handleLogin} />;  // Si no hay usuario logueado, mostrar login
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
