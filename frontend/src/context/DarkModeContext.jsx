import React, { createContext, useState, useContext, useEffect } from "react";

// Crea el contexto para el modo oscuro
const DarkModeContext = createContext();

// Crea el proveedor del contexto
export const DarkModeProvider = ({ children }) => {
  const [isDarkMode, setIsDarkMode] = useState(false);

  // Cargar el modo oscuro desde el almacenamiento local (si ya estaba activado)
  useEffect(() => {
    const savedMode = localStorage.getItem("isDarkMode");
    if (savedMode === "true") {
      setIsDarkMode(true);
    }
  }, []);

  // Función para alternar entre modos claro y oscuro
  const toggleDarkMode = () => {
    setIsDarkMode((prevMode) => {
      const newMode = !prevMode;
      localStorage.setItem("isDarkMode", newMode.toString()); // Guardar en localStorage
      return newMode;
    });
  };

  return (
    <DarkModeContext.Provider value={{ isDarkMode, toggleDarkMode }}>
      {children}
    </DarkModeContext.Provider>
  );
};

// Hook para usar el contexto en otros componentes
export const useDarkMode = () => useContext(DarkModeContext);