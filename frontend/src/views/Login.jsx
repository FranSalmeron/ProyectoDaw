import React, { useState } from 'react'; 
import 'react-toastify/dist/ReactToastify.css'; 
import { Link, useNavigate } from 'react-router-dom';
import { toast } from 'react-toastify';
import { useDarkMode } from '../context/DarkModeContext'; // Importamos contexto modo oscuro

const SOCKET_URL = import.meta.env.VITE_API_URL;

const Login = () => {
  const [username, setUsername] = useState('');
  const [password, setPassword] = useState('');
  const [error, setError] = useState('');
  const [loading, setLoading] = useState(false);  
  const navigate = useNavigate();
  const { isDarkMode } = useDarkMode(); // Obtenemos el modo oscuro

  const handleLogin = async (e) => {
    e.preventDefault();
    setLoading(true);  

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
     
      toast.success('¡Login exitoso!');  
      setLoading(false); 
      window.location.reload();
      navigate(`/`);
      
    } else {
      const errorData = await response.json();
      setError(errorData.message || 'Error al iniciar sesión');
      toast.error('Error al iniciar sesión');  
      setLoading(false); 
    }
  };

  // Clases para modo oscuro
  const bgMain = isDarkMode ? "bg-[#1C1C1E] text-white" : "bg-[#F5EFEB] text-black";
  const formBg = isDarkMode ? "bg-[#2F4156]" : "bg-[#2F4156]"; // ya oscuro, igual
  const inputBg = isDarkMode ? "bg-gray-800 text-white" : "bg-gray-800 text-white"; // igual para inputs, ya oscuro
  const btnBg = isDarkMode ? "bg-red-600 hover:bg-red-700" : "bg-red-500 hover:bg-red-600";
  const btnFocusRing = "focus:ring-2 focus:ring-red-500";

  return (
  <div className={`${bgMain} min-h-screen p-5 flex items-center justify-center transition-colors duration-300`}>
    <div className={`w-9/10 max-w-md mx-auto ${formBg} p-8 rounded-lg shadow-lg text-white`}>
      <h1 className="text-3xl font-bold text-center mb-6">Iniciar sesión</h1>

      <form onSubmit={handleLogin}>
        {/* Usuario */}
        <div className="mb-4">
          <label htmlFor="username" className="block text-lg font-medium mb-2">
            Usuario:
          </label>
          <input
            id="username"
            type="text"
            placeholder="Usuario"
            value={username}
            required
            onChange={(e) => setUsername(e.target.value)}
            className={`w-full p-3 rounded-lg ${inputBg} text-white placeholder-gray-300 focus:outline-none ${btnFocusRing}`}
          />
        </div>

        {/* Contraseña */}
        <div className="mb-6">
          <label htmlFor="password" className="block text-lg font-medium mb-2">
            Contraseña:
          </label>
          <input
            id="password"
            type="password"
            placeholder="Contraseña"
            value={password}
            required
            onChange={(e) => setPassword(e.target.value)}
            className={`w-full p-3 rounded-lg ${inputBg} text-white placeholder-gray-300 focus:outline-none ${btnFocusRing}`}
          />
        </div>

        {/* Botón de submit */}
        <div className="flex justify-center mb-4">
          <button
            type="submit"
            disabled={loading}
            className={`w-full py-3 text-white rounded-lg transition duration-300 focus:outline-none ${btnBg} ${btnFocusRing} ${
              loading ? "cursor-not-allowed opacity-70" : ""
            }`}
          >
            {loading ? "Cargando..." : "Iniciar sesión"}
          </button>
        </div>
      </form>

      {/* Mensaje de error */}
      {error && <p className="text-red-400 text-center">{error}</p>}
    </div>
  </div>
);
};

export default Login;