import React, { useEffect, useState } from 'react';

const WebSocketComponent = () => {
  // Definir tipos correctos para los estados
  const [messages, setMessages] = useState<string[]>([]);  // Array de strings
  const [input, setInput] = useState<string>('');  // Cadena de texto
  const [socket, setSocket] = useState<WebSocket | null>(null);  // WebSocket o null

  useEffect(() => {
    // Conectar al WebSocket
    const ws = new WebSocket('ws://localhost:8080'); // Asegúrate de que esta URL coincida con tu backend de WebSocket
    
    ws.onopen = () => {
      console.log('Conectado al WebSocket');
    };

    ws.onmessage = (event) => {
      // Si el mensaje es JSON, lo parseas
      try {
        const newMessage = JSON.parse(event.data);  // Si los mensajes son JSON
        setMessages((prevMessages) => [...prevMessages, newMessage]);
      } catch (error) {
        console.error("Error al parsear el mensaje:", error);
        setMessages((prevMessages) => [...prevMessages, event.data]);  // Si los mensajes son solo texto
      }
    };

    ws.onclose = () => {
      console.log('Conexión cerrada');
    };

    ws.onerror = (error) => {
      console.error('Error en WebSocket:', error);
    };

    // Guardar la conexión en el estado
    setSocket(ws);

    // Limpiar la conexión cuando el componente se desmonte
    return () => {
      if (ws) {
        ws.close();
      }
    };
  }, []);

  // Enviar un mensaje al servidor WebSocket
  const handleSendMessage = () => {
    if (socket && input) {
      socket.send(input);  // Aquí puedes enviar un JSON si lo necesitas
      setInput('');  // Limpiar el input
    }
  };

  return (
    <div>
      <h2>Chat WebSocket</h2>
      <div>
        <ul>
          {messages.map((msg, index) => (
            <li key={index}>{msg}</li>  // Asegúrate de mostrar los mensajes correctamente
          ))}
        </ul>
      </div>
      <input
        type="text"
        value={input}
        onChange={(e) => setInput(e.target.value)}
        placeholder="Escribe un mensaje..."
      />
      <button onClick={handleSendMessage}>Enviar</button>
    </div>
  );
};

export default WebSocketComponent;
