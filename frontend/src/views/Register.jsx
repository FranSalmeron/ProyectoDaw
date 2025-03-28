import React, { useState } from 'react';
import { toast, ToastContainer } from 'react-toastify';  
import 'react-toastify/dist/ReactToastify.css'; 

const symfonyUrl = import.meta.env.VITE_API_URL;

function Register() {
    const [name, setName] = useState('');
    const [email, setEmail] = useState('');
    const [address, setAddress] = useState('');
    const [phone, setPhone] = useState('');
    const [password, setPassword] = useState('');
    const roles =(['ROLE_USER']); 

    // Función para manejar el envío del formulario

    // Función para validar el formato del email
    const validateEmail = (email) => {
        const emailRegex = /\S+@\S+\.\S+/;
        return emailRegex.test(email);
    };

    const validatePhone = (phoneNumber) => {
        const phoneRegex = /^(?:\+?\d{1,3})?[\s\-]?\(?\d{2,3}\)?[\s\-]?\d{3}[\s\-]?\d{3}$/;
        if (phoneRegex.test(phoneNumber)) {
            console.log("Número de teléfono válido");
            return true;
        } else {
            console.log("Número de teléfono inválido");
            return false;
        }
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        if (validateEmail(email) && validatePhone(phone)) {
            const userData = {
                name,
                email,
                address,
                phone,
                password,
                roles
            };

             // Enviar los datos al backend con fetch
            const response = await fetch(`${symfonyUrl}/api/user/new`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(userData),
            });

            if (response.ok) {
                const result = await response.json();
                toast.success(result.message); 
            } else {
                const error = await response.json();
                toast.error(error.error); 
            }
        } else {
        toast.error('El correo electrónico no es válido o el numero de telefono');
        }
    };

    return (
        <div class="w-9/10 max-w-md mx-auto bg-black text-white p-8 rounded-lg shadow-lg m-5">
        <h2 class="text-3xl font-bold text-center text-white-300 mb-6">Introduce tus datos</h2>
        
        <form onSubmit={handleSubmit}>
            {/* Nombre completo */}
            <div class="mb-4">
                <label htmlFor="name" class="block text-lg font-medium mb-2">Nombre completo:</label>
                <input
                    id="name"
                    type="text"
                    value={name}
                    onChange={(e) => setName(e.target.value)}
                    class="w-full p-3 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-red-500"
                    placeholder="Escribe tu nombre completo"
                />
            </div>
            
            {/* Email */}
            <div class="mb-4">
                <label htmlFor="email" class="block text-lg font-medium mb-2">Email:</label>
                <input
                    id="email"
                    type="email"
                    value={email}
                    onChange={(e) => setEmail(e.target.value)}
                    class="w-full p-3 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-red-500"
                    placeholder="Escribe tu email"
                />
            </div>
    
            {/* Dirección */}
            <div class="mb-4">
                <label htmlFor="address" class="block text-lg font-medium mb-2">Dirección:</label>
                <input
                    id="address"
                    type="text"
                    value={address}
                    onChange={(e) => setAddress(e.target.value)}
                    class="w-full p-3 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-red-500"
                    placeholder="Escribe tu dirección"
                />
            </div>
    
            {/* Teléfono */}
            <div class="mb-4">
                <label htmlFor="phone" class="block text-lg font-medium mb-2">Teléfono:</label>
                <input
                    id="phone"
                    type="text"
                    value={phone}
                    onChange={(e) => setPhone(e.target.value)}
                    class="w-full p-3 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-red-500"
                    placeholder="Escribe tu teléfono"
                />
            </div>
    
            {/* Contraseña */}
            <div class="mb-6">
                <label htmlFor="password" class="block text-lg font-medium mb-2">Contraseña:</label>
                <input
                    id="password"
                    type="password"
                    value={password}
                    onChange={(e) => setPassword(e.target.value)}
                    class="w-full p-3 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-red-500"
                    placeholder="Crea tu contraseña"
                />
            </div>
    
            {/* Botón */}
            <div class="flex justify-center">
                <button
                    type="submit"
                    class="w-full py-3 bg-red-500 text-white rounded-lg hover:bg-red-600 transition duration-300 focus:outline-none focus:ring-2 focus:ring-red-500"
                >
                    Registrar
                </button>
            </div>
        </form>
    
        {/* Contenedor para las notificaciones */}
        <ToastContainer />
    </div>
    )    
}

export default Register;
