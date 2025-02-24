import React, { useState } from 'react';

const SOCKET_URL = import.meta.env.VITE_API_URL;

const Login = ({ onLogin }) => {
  const [username, setUsername] = useState('');
  const [password, setPassword] = useState('');
  const [error, setError] = useState('');

  const handleLogin = async (e) => {
    e.preventDefault();

    console.log('Datos a enviar:', { name: username, password });

    // Hacer la solicitud al backend para obtener el JWT
    const response = await fetch(`${SOCKET_URL}/api/login`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ name: username, password }),
    });

    if (response.ok) {
      const data = await response.json();
      const token = data.token;

      // Guardar el token en localStorage
      localStorage.setItem('jwt', token);

      // Llamar a onLogin para que el chat pueda usar el JWT
      onLogin(token);

      // Aquí es donde debes realizar la conexión WebSocket, pasándole el JWT como parte de las cabeceras
      const socket = new WebSocket(`${SOCKET_URL}/chat`, [], {
        headers: {
          Authorization: `Bearer ${token}`,  // Enviar el token en las cabeceras
        },
      });

      // Usar esta conexión para gestionar los mensajes del chat
      socket.onmessage = (event) => {
        console.log(event.data); // Aquí manejas los mensajes recibidos en el WebSocket
      };

      socket.onerror = (error) => {
        console.error('WebSocket error:', error);
      };

      socket.onopen = () => {
        console.log('Conexión WebSocket establecida');
      };

    } else {
      const errorData = await response.json();
      setError(errorData.message || 'Error al iniciar sesión');
    }
  };

  return (
    <div>
      <h1>Iniciar sesión</h1>
      <form onSubmit={handleLogin}>
        <input
          type="text"
          placeholder="Usuario"
          value={username}
          required
          onChange={(e) => setUsername(e.target.value)}
        />
        <input
          type="password"
          placeholder="Contraseña"
          value={password}
          required
          onChange={(e) => setPassword(e.target.value)}
        />
        <button type="submit">Iniciar sesión</button>
      </form>
      {error && <p>{error}</p>}
    </div>
  );
};

export default Login;
