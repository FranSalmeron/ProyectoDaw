import { useEffect, useState } from 'react';
import './App.css'
import Chat from './Components/Chat.jsx';

const apiUrl = import.meta.env.VITE_API_URL;
const wsUrl = import.meta.env.VITE_API_WS_URL;

function App() {
const [message, setMessage] = useState('');
useEffect(() => {
fetch(`${apiUrl}/api/db`)
.then((res) => res.json())
.then((data) => setMessage(data.message));
}, []);
return (
<>
<Chat />
<div>
<h1>Frontend en React de Francisco José Salmerón Puig</h1>
<p>Esta aplicación se conecta al backend de Symfony pidiéndole una respuesta</p>
<p>respuesta del Backend: {message || 'Cargando información...'}</p>
</div>
</>
);
}
export default App;