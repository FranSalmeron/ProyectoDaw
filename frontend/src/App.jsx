import React from 'react';
import './App.css';
import 'react-toastify/dist/ReactToastify.css';
import { CarProvider } from './context/CarContext';
import { ChatProvider } from './context/ChatContext';
import { RouterProvider } from "react-router-dom";
import { router } from "./routes/router";

function App() {
   
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
