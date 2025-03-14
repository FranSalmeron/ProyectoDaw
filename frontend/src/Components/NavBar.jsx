import { useState } from 'react';

const NavBar = ({ userName, onSelectPage, onLogout }) => {
    const [isMenuOpen, setIsMenuOpen] = useState(false); // Estado para el menú desplegable

    const toggleMenu = () => {
        setIsMenuOpen(!isMenuOpen); // Alternar la visibilidad del menú
    };

    return (
        <nav class="bg-gray-800 p-4 relative z-20">
            <div class="flex justify-between items-center">
                {/* Menú desplegable */}
                <button onClick={toggleMenu} class="text-white text-3xl">
                    &#9776; {/* Icono de hamburguesa */}
                </button>

                <h2 class="text-white mx-auto">RenovAuto</h2>

                <div class="text-white">
                    {userName ? `Bienvenido, ${userName}` : 'Bienvenido'}
                    {userName == null && (
                        <ul>
                            <li>
                            <button onClick={() => onSelectPage('login')} className="text-white">Logearse</button>
                            </li>
                            <li>
                            <button onClick={() => onSelectPage('register')} className="text-white">Registrarse</button>
                            </li>
                        </ul>
                        )}
                </div>
            </div>

            {/* Menú desplegable */}
            {isMenuOpen && (
                <ul class="absolute top-16 left-4 bg-gray-800 p-4 space-y-4 rounded-md shadow-lg z-20">
                    <li>
                        <button onClick={() => onSelectPage('home')} class="text-white">Inicio</button>
                    </li>
                    {!userName ? (
                        <>
                            <li>
                                <button onClick={() => onSelectPage('login')} class="text-white">Logearse</button>
                            </li>
                            <li>
                                <button onClick={() => onSelectPage('register')} class="text-white">Registrarse</button>
                            </li>
                        </>
                    ) : (
                        <>
                            <li>
                                <button onClick={() => onSelectPage('submitCar')} class="text-white">Vender Coche</button>
                            </li>
                            <li>
                                <button onClick={() => onSelectPage('chat')} class="text-white">Chats</button>
                            </li>
                            <li>
                                <button onClick={onLogout} class="text-white">Cerrar sesión</button>
                            </li>
                        </>
                    )}
                </ul>
            )}
        </nav>
    );
}

export default NavBar;
