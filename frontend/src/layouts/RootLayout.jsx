import { Outlet } from "react-router-dom";
import { Footer, NavBar } from "../components/indexComponents.jsx";

const RootLayout = () => {
  return (
    // contenedor principal
    <div className="min-h-screen flex flex-col bg-gray-100">
      <NavBar />
      {/* Aquí se renderizará el contenido de las rutas */}
      <div className="flex-grow">
        <Outlet />
      </div>
      <Footer />
    </div>
  );
};

export default RootLayout;
