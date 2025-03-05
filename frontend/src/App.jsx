import { useState } from 'react';
import './App.css'
import Footer from './Components/Footer.jsx';
import NavBar from './Components/NavBar.jsx';
import Register from './Components/Register.jsx';
import Login from './Components/Login.jsx';
import Home from './Components/Home.jsx';

function App() {
    const [currentPage, setCurrentPage] = useState('home');
    const [userName, setUserName] = useState(localStorage.getItem('userName'));

    const handleLogin = (username) => {
        setUserName(username);
        localStorage.setItem('userName', username); 
      };
    
      const handleLogout = () => {
        setUserName(null); 
        localStorage.removeItem('userName'); 
        setCurrentPage('home');
      };
    
    const renderPage = () => {
        switch (currentPage) {
          case 'home':
            return <Home />;
          case 'login':
             return <Login onLogin={handleLogin} onLoginSuccess={() => setCurrentPage('home')} />;
          case 'register':
             return <Register />;
          default:
             return <Home />;
        }
      };
    return (
    <>
    <div class="bg-gray-300">
        <NavBar userName={userName} onSelectPage={setCurrentPage} onLogout={handleLogout} />
        {renderPage()} 
        <Footer />
    </div>
    </>
    );
    }
    export default App;