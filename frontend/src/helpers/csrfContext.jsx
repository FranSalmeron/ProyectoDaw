import React, { createContext, useContext, useState, useEffect } from 'react';
import { getCsrfToken } from '../utils/getCsrfToken.jsx'; // La función para obtener el token

const CsrfContext = createContext();

export const useCsrfToken = () => {
  return useContext(CsrfContext);
};

export const CsrfProvider = ({ children }) => {
  const [csrfToken, setCsrfToken] = useState(null);

  useEffect(() => {
    const fetchCsrfToken = async () => {
      const token = await getCsrfToken();
      setCsrfToken(token); // Guardamos el token en el estado local
    };

    fetchCsrfToken();
  }, []);

  return (
    <CsrfContext.Provider value={{ csrfToken }}>
      {children}
    </CsrfContext.Provider>
  );
};
