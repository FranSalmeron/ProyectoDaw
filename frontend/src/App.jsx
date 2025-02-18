import { useEffect, useState } from 'react';
import React from 'react';
import MercureNotifications from './Components/MercureNotifications.jsx';
import './App.css'

const urlBackend = import.meta.env.VITE_BACKEND_URL;
const portBackend = import.meta.env.VITE_BACKEND_PORT;

function App() {
const [message, setMessage] = useState('');
useEffect(() => {
fetch(`${urlBackend}/api/db`)
.then((res) => res.json())
.then((data) => setMessage(data.message));
}, []);
return (
<>
<div>
    <h1>Bienvenido a mi Aplicación</h1>
    <MercureNotifications /> {/* Usas el componente */}
</div>
<div>
    <h1>Frontend en React de Francisco José Salmerón Puig</h1>
    <p>Esta aplicación se conecta al backend de Symfony pidiéndole una respuesta</p>
    <p>respuesta del Backend: {message || 'Cargando información...'}</p>
</div>
</>

);
}
export default App;