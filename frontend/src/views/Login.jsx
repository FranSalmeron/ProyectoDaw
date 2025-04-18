import React, { useState } from 'react'; 
import 'react-toastify/dist/ReactToastify.css'; 
import { Link, useNavigate } from 'react-router-dom';
import { toast } from 'react-toastify';

const SOCKET_URL = import.meta.env.VITE_API_URL;

const Login = () => {
  const [username, setUsername] = useState('');
  const [password, setPassword] = useState('');
  const [error, setError] = useState('');
  const [loading, setLoading] = useState(false);  
  const navigate = useNavigate();

  const handleLogin = async (e) => {
    e.preventDefault();
    setLoading(true);  // Activamos el indicador de carga

    // Hacer la solicitud al backend para obtener el JWT
    const response = await fetch(`${SOCKET_URL}/api/login`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ name: username, password }),
    });

    if (response.ok) {
      const data = await response.json();
      const token = data.token;
      const refreshToken = data.refreshToken;

      localStorage.setItem('username', username);
      localStorage.setItem('jwt', token);
      localStorage.setItem('refreshToken', refreshToken);
     
      // Mostrar notificación de login exitoso
      toast.success('¡Login exitoso!');  
      setLoading(false); 
      navigate(`/`);
      
    } else {
      const errorData = await response.json();
      setError(errorData.message || 'Error al iniciar sesión');
      toast.error('Error al iniciar sesión');  // Notificación de error
      setLoading(false); 
    }
  };

  return (
    <div class="bg-[#F5EFEB] min-h-screen p-5">
    <div class="w-9/10 max-w-md mx-auto bg-[#2F4156] p-8 text-white rounded-lg shadow-lg ">
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
    </div>
    </div>
  );
};

export default Login;
