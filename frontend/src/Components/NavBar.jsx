import { useState } from 'react';
import { NavLink } from "react-router-dom";
import { ROUTES } from "../routes/paths";

const NavBar = () => {
    const [isMenuOpen, setIsMenuOpen] = useState(false); // Estado para el menú desplegable
    const userName = localStorage.getItem('username');

    const toggleMenu = () => {
        setIsMenuOpen(!isMenuOpen); // Alternar la visibilidad del menú
    };

    const handleLogout = () => {
        localStorage.removeItem('userName'); 
        localStorage.removeItem('jwt'); 
        localStorage.removeItem('refreshToken'); 
        localStorage.removeItem('cachedCars')
        localStorage.removeItem('cachedChats');
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
                            <NavLink
                                to={ROUTES.LOGIN}
                                className={({
                                isActive,
                                }) => `text-white  hover:text-red:100  
                                ${isActive ? "font-bold" : ""}`}
                            >
                                Logearse
                            </NavLink>
                            </li>
                            <li>
                            <NavLink
                                to={ROUTES.REGISTER}
                                className={({
                                isActive,
                                }) => `text-white  hover:text-red:100  
                                ${isActive ? "font-bold" : ""}`}
                            >
                                Registrarse
                            </NavLink>
                            </li>
                        </ul>
                        )}
                </div>
            </div>

            {/* Menú desplegable */}
            {isMenuOpen && (
                <ul class="absolute top-16 left-4 bg-gray-800 p-4 space-y-4 rounded-md shadow-lg z-20">
                    <li>
                        <NavLink
                            to={ROUTES.HOME}
                            className={({ isActive }) => `text-white   
                            ${isActive ? "font-bold hover:text-red:100" : ""}
                            
                            `}
                        >
                        Inicio
                        </NavLink>
                    </li>
                    {!userName ? (
                        <>
                            <li>
                            <NavLink
                                to={ROUTES.LOGIN}
                                className={({
                                isActive,
                                }) => `text-white  hover:text-red:100  
                                ${isActive ? "font-bold" : ""}`}
                            >
                                Logearse
                            </NavLink>
                            </li>
                            <li>
                            <NavLink
                                to={ROUTES.REGISTER}
                                className={({
                                isActive,
                                }) => `text-white  hover:text-red:100  
                                ${isActive ? "font-bold" : ""}`}
                            >
                                Registrarse
                            </NavLink>
                            </li>
                        </>
                    ) : (
                        <>
                            <li>
                            <NavLink
                                to={ROUTES.SUBMIT_CAR}
                                className={({
                                isActive,
                                }) => `text-white  hover:text-red:100
                                ${isActive ? "font-bold" : ""}`}
                            >
                                Vender Coche
                            </NavLink>
                            </li>
                            <li>
                            <NavLink
                                to={ROUTES.CHATS}
                                className={({
                                isActive,
                                }) => `text-white  hover:text-red:100  
                                ${isActive ? "font-bold" : ""}`}
                            >
                                Chats
                            </NavLink>
                            </li>
                            <li>
                                <button onClick={handleLogout()} class="text-white">Cerrar sesión</button>
                            </li>
                        </>
                    )}
                </ul>
            )}
        </nav>
    );
}

export default NavBar;
