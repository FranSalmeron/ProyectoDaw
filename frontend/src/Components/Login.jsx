import React, { useState } from 'react';
import { toast, ToastContainer } from 'react-toastify';  
import 'react-toastify/dist/ReactToastify.css'; 

const SOCKET_URL = import.meta.env.VITE_API_URL;

const Login = ({ onLogin, onValidateToken }) => {
  const [username, setUsername] = useState('');
  const [password, setPassword] = useState('');
  const [error, setError] = useState('');
  const [loading, setLoading] = useState(false);  

  const handleLogin = async (e) => {
    e.preventDefault();
    setLoading(true);  // Activamos el indicador de carga

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

      localStorage.setItem('jwt', token);

      // Llamar a onLogin para pasar el token y continuar
      onLogin(token);

      // Mostrar notificación de login exitoso
      toast.success('¡Login exitoso!');  
      setLoading(false); 
    } else {
      const errorData = await response.json();
      setError(errorData.message || 'Error al iniciar sesión');
      toast.error('Error al iniciar sesión');  // Notificación de error
      setLoading(false); 
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
        <button type="submit" disabled={loading}>
          {loading ? 'Cargando...' : 'Iniciar sesión'}
        </button>
      </form>
      {error && <p>{error}</p>}

      {/* Botón para ingresar al chat */}
      <button onClick={() => onValidateToken(localStorage.getItem('jwt'))}>
        Ingresar al chat
      </button>

      {/* Contenedor para las notificaciones */}
      <ToastContainer />
    </div>
  );
};

export default Login;
