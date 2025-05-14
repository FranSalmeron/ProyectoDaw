import React, { useEffect } from "react";
import { toast, ToastContainer } from "react-toastify";
import "react-toastify/dist/ReactToastify.css";
import { CarProvider } from "./context/CarContext";
import { ChatProvider } from "./context/ChatContext";
import { RouterProvider } from "react-router-dom";
import { FavoriteProvider } from "./context/FavoriteContext";
import { UserProvider } from "./context/UserContext";
import { DarkModeProvider } from "./context/DarkModeContext";
import { ThemeProvider } from "./context/ThemeContext"; // De momento no se usa mañana se usará
import { router } from "./routes/router";
import { isTokenExpired } from "./helpers/decodeToken";
import "@fortawesome/fontawesome-free/css/all.min.css";
import ScrollUp from "./components/ScrollUp";

function App() {
  const token = localStorage.getItem("jwt");

  useEffect(() => {
    if (isTokenExpired(token)) {
      // Comprobar si el token expiró, si lo hizo, se genera uno nuevo
    } else {
      toast.info("La sesión ha expirado");
    }
  }, [token]);

  return (
    <div className="bg-[#F5EFEB] min-h-screen flex flex-col">
      <ToastContainer />
      <DarkModeProvider> {/* Proveedor de modo oscuro */}
        <CarProvider>
          <ChatProvider>
            <FavoriteProvider>
              <UserProvider>
                <RouterProvider router={router} />
                <ScrollUp />
              </UserProvider>
            </FavoriteProvider>
          </ChatProvider>
        </CarProvider>
      </DarkModeProvider>
    </div>
  );
}

export default App;