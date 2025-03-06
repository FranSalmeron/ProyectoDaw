import { useState, useEffect } from 'react'

const NavBar = ({ userName, onSelectPage, onLogout }) => {
    return (
        <nav class="bg-gray-800 p-4">
          <ul class="flex space-x-4">
            <li>
              <button onClick={() => onSelectPage('home')} class="text-white">Inicio</button>
            </li>
            {!userName ? (
                <div class="ml-auto flex items-center space-x-4">
                    <li>
                        <button onClick={() => onSelectPage('login')} class="text-white">Logearse</button>
                    </li>
                    <li>
                        <button onClick={() => onSelectPage('register')} class="text-white">Registrarse</button>
                    </li>
                    </div>
            ) : (
                <>
                    <li>
                        <button onClick={() => onSelectPage('submitCar')} class="text-white">Poner coche a la venta</button>
                    </li>
                    <div class="ml-auto flex items-center space-x-4">
                        <li class="text-white">Bienvenido, {userName}</li>
                        <li>
                            <button onClick={onLogout} class="text-white">Cerrar sesión</button>
                        </li>
                    </div>
                </>
            )}
        </ul>
    </nav>
  );
}

export default NavBar