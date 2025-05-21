import { Outlet, Navigate, useLocation } from "react-router-dom";
import { Footer, NavBar } from "../components/indexComponents.jsx";
import { isBanned } from "../helpers/decodeToken.jsx";
import { ROUTES } from "../routes/paths.js";

const RootLayout = () => {
  const location = useLocation();

  useEffect(() => {
    window.scrollTo(0, 0);
  }, [location]);

  const isBannedPage = location.pathname === ROUTES.BANNED;
  const isErrorPage = location.pathname === "/error"; // Ajusta según tu ruta de error real

  // Si el usuario está baneado y no está en la página de baneo o error, redirígelo
  if (isBanned() && !isBannedPage && !isErrorPage) {
    return <Navigate to={ROUTES.BANNED} replace />;
  }

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

export default RootLayout;
