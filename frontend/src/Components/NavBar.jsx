import React from 'react'

const NavBar = ({onSelectPage}) => {
    return (
        <nav className="bg-gray-800 p-4">
          <ul className="flex space-x-4">
            <li>
              <button onClick={() => onSelectPage('home')} className="text-white">Inicio</button>
            </li>
            <li>
              <button onClick={() => onSelectPage('login')} className="text-white">Logearse</button>
            </li>
            <li>
              <button onClick={() => onSelectPage('register')} className="text-white">Registrarse</button>
            </li>
        </ul>
    </nav>
  );
}

export default NavBar