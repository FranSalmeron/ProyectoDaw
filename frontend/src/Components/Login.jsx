import React, { useState } from 'react';
import { toast, ToastContainer } from 'react-toastify';  
import 'react-toastify/dist/ReactToastify.css'; 

const SOCKET_URL = import.meta.env.VITE_API_URL;

const Login = ({ onLogin, onLoginSuccess }) => {
  const [username, setUsername] = useState('');
  const [password, setPassword] = useState('');
  const [error, setError] = useState('');
  const [loading, setLoading] = useState(false);  

  // Función para decodificar un token JWT y obtener el payload
  const decodeJwt = (token) => {
    const base64Url = token.split('.')[1];  
    const base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/'); 
    const jsonPayload = decodeURIComponent(atob(base64).split('').map(function(c) {
        return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
    }).join(''));
    
    return JSON.parse(jsonPayload);  // Convertimos el payload a un objeto JSON
  };
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

      const decodedToken = decodeJwt(token);
      const userId = decodedToken.userId;
      const userName = decodedToken.name;

      localStorage.setItem('jwt', token);
      localStorage.setItem('userName', userName);
      localStorage.setItem('userId', userId);

      // Mostrar notificación de login exitoso
      toast.success('¡Login exitoso!');  
      setLoading(false); 
      onLogin(username);
      onLoginSuccess();
    } else {
      const errorData = await response.json();
      setError(errorData.message || 'Error al iniciar sesión');
      toast.error('Error al iniciar sesión');  // Notificación de error
      setLoading(false); 
    }
  };

  return (
    <div class="w-9/10 max-w-md mx-auto bg-black text-white p-8 rounded-lg shadow-lg m-5">
    <h1 class="text-3xl font-bold text-center text-white-500 mb-6">Iniciar sesión</h1>
    
    <form onSubmit={handleLogin}>
        {/* Usuario */}
        <div class="mb-4">
            <label htmlFor="username" class="block text-lg font-medium mb-2">Usuario:</label>
            <input
                id="username"
                type="text"
                placeholder="Usuario"
                value={username}
                required
                onChange={(e) => setUsername(e.target.value)}
                class="w-full p-3 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-red-500"
            />
        </div>

        {/* Contraseña */}
        <div class="mb-6">
            <label htmlFor="password" class="block text-lg font-medium mb-2">Contraseña:</label>
            <input
                id="password"
                type="password"
                placeholder="Contraseña"
                value={password}
                required
                onChange={(e) => setPassword(e.target.value)}
                class="w-full p-3 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-red-500"
            />
        </div>

        {/* Botón de submit */}
        <div class="flex justify-center mb-4">
            <button
                type="submit"
                disabled={loading}
                class="w-full py-3 bg-red-500 text-white rounded-lg hover:bg-red-600 transition duration-300 focus:outline-none focus:ring-2 focus:ring-red-500"
            >
                {loading ? 'Cargando...' : 'Iniciar sesión'}
            </button>
        </div>
    </form>

        {/* Mensaje de error */}
        {error && <p class="text-red-500 text-center">{error}</p>}

        {/* Contenedor para las notificaciones */}
        <ToastContainer />
    </div>
  );
};

export default Login;
