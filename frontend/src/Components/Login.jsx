import React, { useState } from 'react';

const SOCKET_URL = import.meta.env.VITE_API_URL;

const Login = ({ onLogin }) => {
  const [username, setUsername] = useState('');
  const [password, setPassword] = useState('');
  const [error, setError] = useState('');

  const handleLogin = async (e) => {
    e.preventDefault();

    // Hacer la solicitud al backend para obtener el JWT
    const response = await fetch(`${SOCKET_URL}/api/login`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ username, password }),
    });

    if (response.ok) {
      const data = await response.json();
      const token = data.token;

      // Guardar el token en localStorage
      localStorage.setItem('jwt', token);

      // Llamar a onLogin para que el chat pueda usar el JWT
      onLogin(token);

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
          onChange={(e) => setUsername(e.target.value)}
        />
        <input
          type="password"
          placeholder="Contraseña"
          value={password}
          onChange={(e) => setPassword(e.target.value)}
        />
        <button type="submit">Iniciar sesión</button>
      </form>
      {error && <p>{error}</p>}
    </div>
  );
};

export default Login;
