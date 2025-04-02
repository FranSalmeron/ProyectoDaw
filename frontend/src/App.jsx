import React, { useEffect } from 'react';
import './App.css';
import 'react-toastify/dist/ReactToastify.css';
import { CarProvider } from './context/CarContext';
import { ChatProvider } from './context/ChatContext';
import { RouterProvider } from "react-router-dom";
import { router } from "./routes/router";
import { isTokenExpired } from './helpers/decodeToken';

function App() {
    const token = localStorage.getItem('jwt');

    useEffect(() => {
        if (isTokenExpired(token)) {
            // Comprobar si el token expiro si lo hizo se genera uno nuevo
        } else {
            toast.info('La sesión ha expirado');
        }
    }, [token]); 
   
    return (
        <div className="bg-gray-300">
            <CarProvider>
                <ChatProvider>
                    <RouterProvider router={router} />
                </ChatProvider>
            </CarProvider>
        </div>
    );
}

export default App;
