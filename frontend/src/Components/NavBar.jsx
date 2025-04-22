import { useState } from "react";
import { NavLink, useNavigate } from "react-router-dom";
import { ROUTES } from "../routes/paths";
import { isAdmin } from "../helpers/decodeToken";

const NavBar = () => {
  const [isMenuOpen, setIsMenuOpen] = useState(false);
  const navigate = useNavigate();
  const userName = localStorage.getItem("username");

  const toggleMenu = () => setIsMenuOpen(!isMenuOpen);
  const closeMenu = () => setIsMenuOpen(false);

  const handleLogout = () => {
    localStorage.clear();
    navigate(ROUTES.HOME);
  };

  return (
    <div className="relative z-40">
      {/* NAVBAR FIJO ARRIBA */}
      <nav className="bg-[#567C8D] p-4 sticky top-0 z-40">
        <div className="flex justify-between items-center relative">
          <button
            onClick={toggleMenu}
            className="text-white text-3xl absolute z-50"
          >
            {isMenuOpen ? "✕" : "☰"}
          </button>

          <div className="flex-1 flex justify-center">
            <NavLink to={ROUTES.HOME}>
              <img
                src="images/logo-blanco.png"
                alt="RenovAuto"
                className="h-20 w-30"
              />
            </NavLink>
          </div>

          <div className="text-white absolute right-0 pr-4 text-sm">
            {userName ? `Bienvenido, ${userName}` : "Bienvenido"}
          </div>
        </div>
      </nav>

      {/* SIDEBAR ABSOLUTO, NO DESPLAZA CONTENIDO */}
      <div
        className={`absolute left-0 w-64 bg-[#43697a] p-6 shadow-lg transition-transform duration-300 ease-in-out ${
          isMenuOpen ? "translate-x-0" : "-translate-x-full"
        }`}
        style={{ top: "100%" }} // Justo debajo del navbar
      >
        <ul className="space-y-4 text-white">
          <li>
            <NavLink to={ROUTES.HOME} onClick={closeMenu}>
              Inicio
            </NavLink>
          </li>
          <li>
            <NavLink to={ROUTES.ABOUT} onClick={closeMenu}>
              Sobre Nosotros
            </NavLink>
          </li>
          {!userName ? (
            <>
              <li>
                <NavLink to={ROUTES.LOGIN} onClick={closeMenu}>
                  Logearse
                </NavLink>
              </li>
              <li>
                <NavLink to={ROUTES.REGISTER} onClick={closeMenu}>
                  Registrarse
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
              <li>
                <NavLink to={ROUTES.PROFILE} onClick={closeMenu}>
                  Perfil
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
