import React, { useState } from 'react'; 
import { toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css'; 
import { createUser } from '../helpers/UserHelper';
import { useNavigate } from 'react-router-dom';
import { useDarkMode } from '../context/DarkModeContext'; // Importamos el modo oscuro

function Register() {
    const [name, setName] = useState('');
    const [email, setEmail] = useState('');
    const [address, setAddress] = useState('');
    const [phone, setPhone] = useState('');
    const [password, setPassword] = useState('');
    const roles =['ROLE_USER']; 
    const navigate = useNavigate(); 

    const { isDarkMode } = useDarkMode(); // Obtenemos modo oscuro

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
                roles,
            };
    
            try {
                const result = await createUser(userData); 
                toast.success(result.message); 
                setTimeout(() => {
                    navigate('/login');
                }, 4000);
            } catch (error) {
                toast.error(error.message || 'Error al crear el usuario'); 
            }
        } else {
            toast.error('El correo electrónico no es válido o el número de teléfono no es válido.');
        }
    };

    // Clases modo oscuro
    const bgMain = isDarkMode ? "bg-[#1C1C1E] text-white" : "bg-[#F5EFEB] text-black";
    const formBg = isDarkMode ? "bg-[#2F4156]" : "bg-[#2F4156]"; // Ya oscuro, mantenemos
    const inputBg = isDarkMode ? "bg-gray-800 text-white placeholder-gray-400" : "bg-gray-800 text-white placeholder-gray-400";
    const btnBg = isDarkMode ? "bg-red-600 hover:bg-red-700" : "bg-red-500 hover:bg-red-600";
    const btnFocusRing = "focus:ring-2 focus:ring-red-500";

    return (
        <div className={`${bgMain} min-h-screen p-5 flex items-center justify-center transition-colors duration-300`}>
            <div className={`w-9/10 max-w-md mx-auto ${formBg} p-8 rounded-lg shadow-lg m-5`}>
                <h2 className="text-3xl font-bold text-center mb-6">Introduce tus datos</h2>
                
                <form onSubmit={handleSubmit}>
                    <div className="mb-4">
                        <label htmlFor="name" className="block text-lg font-medium mb-2">Nombre completo:</label>
                        <input
                            id="name"
                            type="text"
                            value={name}
                            required
                            onChange={(e) => setName(e.target.value)}
                            className={`w-full p-3 rounded-lg ${inputBg} focus:outline-none ${btnFocusRing}`}
                            placeholder="Escribe tu nombre completo"
                        />
                    </div>
                    
                    <div className="mb-4">
                        <label htmlFor="email" className="block text-lg font-medium mb-2">Email:</label>
                        <input
                            id="email"
                            type="email"
                            value={email}
                            required
                            onChange={(e) => setEmail(e.target.value)}
                            className={`w-full p-3 rounded-lg ${inputBg} focus:outline-none ${btnFocusRing}`}
                            placeholder="Escribe tu email"
                        />
                    </div>
            
                    <div className="mb-4">
                        <label htmlFor="address" className="block text-lg font-medium mb-2">Dirección:</label>
                        <input
                            id="address"
                            type="text"
                            value={address}
                            required
                            onChange={(e) => setAddress(e.target.value)}
                            className={`w-full p-3 rounded-lg ${inputBg} focus:outline-none ${btnFocusRing}`}
                            placeholder="Escribe tu dirección"
                        />
                    </div>
            
                    <div className="mb-4">
                        <label htmlFor="phone" className="block text-lg font-medium mb-2">Teléfono:</label>
                        <input
                            id="phone"
                            type="text"
                            value={phone}
                            required
                            onChange={(e) => setPhone(e.target.value)}
                            className={`w-full p-3 rounded-lg ${inputBg} focus:outline-none ${btnFocusRing}`}
                            placeholder="Escribe tu teléfono"
                        />
                    </div>
            
                    <div className="mb-6">
                        <label htmlFor="password" className="block text-lg font-medium mb-2">Contraseña:</label>
                        <input
                            id="password"
                            type="password"
                            value={password}
                            required
                            onChange={(e) => setPassword(e.target.value)}
                            className={`w-full p-3 rounded-lg ${inputBg} focus:outline-none ${btnFocusRing}`}
                            placeholder="Crea tu contraseña"
                        />
                    </div>
            
                    <div className="flex justify-center">
                        <button
                            type="submit"
                            className={`w-full py-3 rounded-lg text-white transition duration-300 focus:outline-none ${btnBg} ${btnFocusRing}`}
                        >
                            Registrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    );    
}

export default Register;