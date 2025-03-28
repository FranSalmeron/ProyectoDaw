import { Outlet } from "react-router-dom";
import { Footer, NavBar } from "../components/indexComponents.jsx";
const RootLayout = () => {
  return (
    // contenedor principal
    <div className="min-h-screen bg-gray-100">
      <NavBar />
      {/* Aquí se renderizará el contenido de las rutas */}
      <Outlet />
      <Footer />
    </div>
  );
};

export default RootLayout;
