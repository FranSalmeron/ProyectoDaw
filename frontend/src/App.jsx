import { useState } from 'react';
import './App.css'
import Footer from './Components/Footer.jsx';
import NavBar from './Components/NavBar.jsx';
import Register from './Components/Register.jsx';
import Login from './Components/Login.jsx';
import Home from './Components/Home.jsx';

function App() {
    const [currentPage, setCurrentPage] = useState('home');

    
    const renderPage = () => {
        switch (currentPage) {
          case 'home':
            return <Home />;
          case 'login':
             return <Login />;
          case 'register':
             return <Register />;
          default:
             return <Home />;
        }
      };
    return (
    <>
    <div class="bg-gray-300">
        <NavBar onSelectPage={(page) => setCurrentPage(page)} />
        {renderPage()} 
        <Footer />
    </div>
    </>
    );
    }
    export default App;