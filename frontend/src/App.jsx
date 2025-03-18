import { useState, useEffect } from 'react';
import './App.css'
import { NavBar, Footer } from './components/indexComponents.jsx';
import { Home, Login, Register, SubmitCar, CarDetails, Chat, Chats, BuyCar } from './views/indexViews.jsx';
import { CsrfProvider } from './helpers/csrfContext.jsx';
import { toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';
import getUserIdFromToken from './helpers/decodeToken.jsx';

function App() {
    const [currentPage, setCurrentPage] = useState('home');
    const [userName, setUserName] = useState(localStorage.getItem('userName'));
    const [selectedCar, setSelectedCar] = useState(null); 
    const [selectedChat, setSelectedChat] = useState(null);
    const [selectedVendor, setSelectedVendor] = useState(null);
    const [errorShown, setErrorShown] = useState(false);

    const userId = getUserIdFromToken();

     // Recargar la página actual desde localStorage si existe
     useEffect(() => {
        const savedPage = localStorage.getItem('currentPage');
        if (savedPage) {
            setCurrentPage(savedPage);
        }
    }, []);

    // Cuando el usuario cambia la página, guardamos esa página en el localStorage
    const handlePageChange = (page) => {
        setCurrentPage(page);
        localStorage.setItem('currentPage', page);
    };

    const handleLogin = (username) => {
        setUserName(username);
        localStorage.setItem('userName', username); 
    };
    
      const handleLogout = () => {
        setUserName(null); 
        localStorage.removeItem('userName'); 
        setCurrentPage('home');
        localStorage.setItem('currentPage', 'home');
    };
    
    const renderPage = () => {
        try {
            switch (currentPage) {
                case 'home':
                    return <Home onSelectCar={setSelectedCar} onSelectPage={handlePageChange} />;
                case 'login':
                    return <Login onLogin={handleLogin} onLoginSuccess={() => handlePageChange('home')} />;
                case 'register':
                    return <Register />;
                case 'submitCar':
                    return <SubmitCar onSubmitSuccess={() => handlePageChange('home')} />;
                case 'car-details':
                    return <CarDetails car={selectedCar} setPage={handlePageChange} setSelectedVendor={setSelectedVendor} />;
                case 'chat':
                    return <Chat sellerId={selectedVendor.sellerId} carId={selectedVendor.carId} setPage={handlePageChange} />;
                case 'chats':
                    return <Chats userIdApi={userId} setPage={handlePageChange} setSelectedVendor={setSelectedVendor} />;
                case 'buycar':
                    return <BuyCar />;
                default:
                    setCurrentPage('home');
                }
            }
            catch (error) {
                if (!errorShown) {
                    toast.error('Página no encontrada, redirigiendo a inicio...');
                    setErrorShown(true); // Marca que el error ya fue mostrado
                }
                setCurrentPage('home'); // Redirige a home en caso de error
                return <Home onSelectCar={setSelectedCar} onSelectPage={handlePageChange} />;
            }
        };

    return (
    <CsrfProvider>
        <div class="bg-gray-300">
            <NavBar userName={userName} onSelectPage={handlePageChange} onLogout={handleLogout} />
            {renderPage()} 
            <Footer />
        </div>
       
    </CsrfProvider>
    );
    }
    export default App;