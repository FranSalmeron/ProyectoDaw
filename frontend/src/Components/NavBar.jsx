import React, { useState } from "react";
import { NavLink, useNavigate } from "react-router-dom";
import { ROUTES } from "../routes/paths";
import { isAdmin } from "../helpers/decodeToken";
import { useDarkMode } from "../context/DarkModeContext"; // Usar el contexto de modo oscuro
import { useCars } from "../context/CarContext"; // Usar el contexto de coches
import { useFavorites } from "../context/FavoriteContext";

const NavBar = () => {
  const [isMenuOpen, setIsMenuOpen] = useState(false);
  const navigate = useNavigate();
  const userName = localStorage.getItem("username");
  const { clearCars } = useCars();
  const { clearFavorites } = useFavorites();

  const { isDarkMode, toggleDarkMode } = useDarkMode();

  const toggleMenu = () => setIsMenuOpen(!isMenuOpen);
  const closeMenu = () => setIsMenuOpen(false);

  const handleLogout = () => {
    localStorage.clear();
    clearFavorites();
    navigate(ROUTES.HOME);
  };

  return (
    <div className="relative z-40">
      <nav
        className={`p-4 sticky top-0 z-40 ${
          isDarkMode ? "bg-[#1C1C1E]" : "bg-[#567C8D]"
        }`}
      >
        <div className="flex justify-between items-center relative">
          {/* Icono de casa fuera del menú hamburguesa */}
          <button
            onClick={() => navigate(ROUTES.HOME)}
            className="text-white text-2xl mr-10"
          >
            <img
              src={isDarkMode ? "images/home-bl.png" : "images/home2.png"}
              alt="RenovAuto"
              className="h-10 w-10 transition duration-500 ease-in-out"
            />
          </button>

          {/* Menú hamburguesa */}
          <button
            onClick={toggleMenu}
            className={`text-3xl absolute left-10 z-50 transition-all duration-300 ease-in-out ${
              isDarkMode ? "text-white" : "text-black"
            }`}
            style={isDarkMode ? { color: "#2462C6" } : { color: "#FFFFFF" }}
            onMouseEnter={(e) => {
              e.target.style.transform = "scale(1.2)"; // Aumenta el tamaño al pasar el ratón
              e.target.style.color = isDarkMode ? "#4CAF50" : "#FFA500"; // Cambia el color al pasar el ratón
            }}
            onMouseLeave={(e) => {
              e.target.style.transform = "scale(1)"; // Vuelve al tamaño original
              e.target.style.color = isDarkMode ? "#2462C6" : "#FFFFFF"; // Restaura el color original
            }}
          >
            {isMenuOpen ? "✕" : "☰"}
          </button>

          {/* Logo */}
          <div className="flex-1 flex justify-center">
            <NavLink to={ROUTES.HOME}>
              <img
                src={
                  isDarkMode ? "images/logo-b.png" : "images/logo-blanco.png"
                }
                alt="RenovAuto"
                className="h-20 w-30 transition duration-500 ease-in-out"
              />
            </NavLink>
          </div>

          {/* Icono de modo oscuro y perfil */}
          <div className="absolute right-0 flex items-center gap-4 pr-4 text-white text-xl">
            {/* Toggle modo oscuro con slider dinámico */}
            <div
              className={`relative w-12 h-6 rounded-full cursor-pointer transition-colors duration-300 ${
                isDarkMode ? "bg-[#2462C6]" : "bg-gray-300"
              }`}
              onClick={toggleDarkMode}
            >
              <div
                className={`absolute top-0.5 w-5 h-5 rounded-full flex items-center justify-center text-xs text-white transition-transform duration-300 ${
                  isDarkMode
                    ? "translate-x-6 bg-gray-800"
                    : "translate-x-1 bg-yellow-400"
                }`}
              >
                {isDarkMode ? "🌙" : "☀️"}
              </div>
            </div>

            {/* Icono de perfil */}
            {userName ? (
              <button onClick={() => navigate(ROUTES.PROFILE)}>
                <img
                  src={
                    isDarkMode ? "images/perfil-bl.png" : "images/perfil2.png"
                  }
                  alt="Usuario"
                  className="h-15 w-15 rounded-full transition duration-500 ease-in-out"
                />
              </button>
            ) : (
              <span className="text-sm">Bienvenido</span>
            )}
          </div>
        </div>
      </nav>

      {/* Sidebar */}
      <div
        className={`absolute left-0 w-64 p-6 shadow-lg transition-transform duration-300 ease-in-out ${
          isMenuOpen ? "translate-x-0" : "-translate-x-full"
        } ${
          isDarkMode ? "bg-[#2C2C2E] text-white" : "bg-[#43697a] text-white"
        }`}
        style={{ top: "100%" }}
      >
        <ul className="space-y-4">
          <li>
            <NavLink to={ROUTES.ABOUT} onClick={closeMenu}>
              Sobre Nosotros
            </NavLink>
          </li>

          {!userName ? (
            <>
              <li>
                <NavLink to={ROUTES.LOGIN} onClick={closeMenu}>
                  Login
                </NavLink>
              </li>
              <li>
                <NavLink to={ROUTES.REGISTER} onClick={closeMenu}>
                  Register
                </NavLink>
              </li>
            </>
          ) : (
            <>
              <li>
                <NavLink to={ROUTES.SUBMIT_CAR} onClick={closeMenu}>
                  Vender Coche
                </NavLink>
              </li>
              <li>
                <NavLink to={ROUTES.CHATS} onClick={closeMenu}>
                  Chats
                </NavLink>
              </li>
              <li>
                <NavLink to={ROUTES.CAR_FAVORITES} onClick={closeMenu}>
                  Favoritos
                </NavLink>
              </li>
              <li>
                <NavLink to={ROUTES.SEE_CARS} onClick={closeMenu}>
                  Ver mis coches
                </NavLink>
              </li>
              {isAdmin() && (
                <>
                  <li>
                    <NavLink to={ROUTES.USERS} onClick={closeMenu}>
                      Gestión de Usuarios
                    </NavLink>
                  </li>
                  <li>
                    <NavLink to={ROUTES.CHATS_LIST} onClick={closeMenu}>
                      Lista de Chats
                    </NavLink>
                  </li>
                  <li>
                    <NavLink to={ROUTES.STATISTICS} onClick={closeMenu}>
                      Estadísticas
                    </NavLink>
                  </li>
                </>
              )}
              <li>
                <button
                  onClick={() => {
                    handleLogout();
                    closeMenu();
                  }}
                >
                  Cerrar sesión
                </button>
              </li>
            </>
          )}
        </ul>
      </div>
    </div>
  );
};

export default NavBar;
