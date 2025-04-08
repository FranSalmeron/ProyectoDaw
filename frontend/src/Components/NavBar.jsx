import { useState } from "react";
import { NavLink, useNavigate } from "react-router-dom";
import { ROUTES } from "../routes/paths";

const NavBar = () => {
  const [isMenuOpen, setIsMenuOpen] = useState(false); // Estado para el menú desplegable
  const navigate = useNavigate();
  const userName = localStorage.getItem("username")
    ? localStorage.getItem("username")
    : null;

  const toggleMenu = () => {
    setIsMenuOpen(!isMenuOpen); // Alternar la visibilidad del menú
  };

  const handleLogout = () => {
    localStorage.removeItem("username");
    localStorage.removeItem("jwt");
    localStorage.removeItem("refreshToken");
    localStorage.removeItem("cachedChats");
    navigate(ROUTES.HOME);
  };

  return (
    <nav class="bg-[#567C8D] p-4 relative z-20">
      <div class="flex justify-between items-center relative">
        {/* Menú desplegable */}
        <button onClick={toggleMenu} class="text-white text-3xl absolute">
          &#9776; {/* Icono de hamburguesa */}
        </button>

        <div className="flex-1 flex justify-center">
          <NavLink
            to={ROUTES.HOME}
            className={({ isActive }) => `text-white   
        ${isActive ? "font-bold hover:text-red:100" : ""}   
        `}
          >
            <img
              src="images/logo-blanco.png"
              alt="RenovAuto"
              className="h-20 w-30"
            />
          </NavLink>
        </div>

        <div class="text-white absolute right-0">
          {userName ? `Bienvenido, ${userName}` : "Bienvenido"}
          {userName == null && (
            <ul>
              <li>
                <NavLink
                  to={ROUTES.LOGIN}
                  className={({ isActive }) => `text-white  hover:text-red:100  
                                ${isActive ? "font-bold" : ""}`}
                >
                  Logearse
                </NavLink>
              </li>
              <li>
                <NavLink
                  to={ROUTES.REGISTER}
                  className={({ isActive }) => `text-white  hover:text-red:100  
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
        <ul class="absolute top-16 left-4 bg-[#43697a] p-4 space-y-4 rounded-md shadow-lg z-20">
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
                  className={({ isActive }) => `text-white  hover:text-red:100  
                                ${isActive ? "font-bold" : ""}`}
                >
                  Logearse
                </NavLink>
              </li>
              <li>
                <NavLink
                  to={ROUTES.REGISTER}
                  className={({ isActive }) => `text-white  hover:text-red:100  
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
                  className={({ isActive }) => `text-white  hover:text-red:100
                                ${isActive ? "font-bold" : ""}`}
                >
                  Vender Coche
                </NavLink>
              </li>
              <li>
                <NavLink
                  to={ROUTES.CHATS}
                  className={({ isActive }) => `text-white  hover:text-red:100  
                                ${isActive ? "font-bold" : ""}`}
                >
                  Chats
                </NavLink>
              </li>
              <li>
                <NavLink
                  to={ROUTES.CAR_FAVORITES}
                  className={({ isActive }) => `text-white  hover:text-red:100  
                                    ${isActive ? "font-bold" : ""}`}
                >
                  Favoritos
                </NavLink>
              </li>
              <li>
                <NavLink
                  to={ROUTES.PROFILE}
                  className={({ isActive }) => `text-white  hover:text-red:100  
                                ${isActive ? "font-bold" : ""}`}
                >
                  Perfil
                </NavLink>
              </li>
              <li>
                <button onClick={handleLogout} className="text-white ">
                  Cerrar sesión
                </button>
              </li>
            </>
          )}
        </ul>
      )}
    </nav>
  );
};

export default NavBar;