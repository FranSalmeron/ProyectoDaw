import React from "react";
import { Navigate, useLocation, Outlet } from "react-router-dom";
import { isBanned } from "../helpers/decodeToken";
import { ROUTES } from "../routes/paths";
import { getUserIdFromToken } from "../helpers/decodeToken";
import { Footer, NavBar } from "../components/indexComponents.jsx";
const ProtectedLayout = () => {
  const location = useLocation();

  // Lógica de autenticación y baneo
  const isAuthenticated = getUserIdFromToken() !== null; // Verificamos si el usuario está autenticado
  const isUserBanned = isBanned(); // Verificamos si el usuario está baneado

  const isBannedPage = location.pathname === ROUTES.BANNED;
  const isErrorPage = location.pathname === "/error"; 

  // Si el usuario está baneado y no está en la página de baneo o error, lo redirigimos
  if (isUserBanned && !isBannedPage && !isErrorPage) {
    return <Navigate to={ROUTES.BANNED} replace />;
  }

  // Si no está autenticado, lo redirigimos al login
  if (!isAuthenticated) {
    return <Navigate to={ROUTES.LOGIN} replace />;
  }

  // Si está todo bien, se muestra el contenido protegido
  return (
    <div className="min-h-screen flex flex-col bg-gray-100">
      <NavBar />
      <div className="flex-grow">
        <Outlet />
      </div>
      <Footer />
    </div>
  );
};

export default ProtectedLayout;
