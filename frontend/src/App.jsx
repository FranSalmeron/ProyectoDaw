import { useEffect, useState } from 'react';
import './App.css'
import Chat from './Components/Chat.jsx';

function App() {
const [message, setMessage] = useState('');
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