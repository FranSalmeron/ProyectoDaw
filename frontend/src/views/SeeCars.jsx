import React, { useEffect, useState } from 'react'
import { useCars } from '../context/CarContext'
import CarCards from '../components/CarCards';
import { useFavorites } from '../context/FavoriteContext';
import { getUserIdFromToken } from '../helpers/decodeToken';
import { getFavorites } from '../helpers/favoriteHelper';
import { carList } from '../helpers/carHelper';
import { toast } from 'react-toastify';
import { useDarkMode } from '../context/DarkModeContext'; // Importamos modo oscuro

const SeeCars = () => {
    const [loading, setLoading] = useState(true);
    const [myCars, setMyCars] = useState([]);

    const { cars, addCars } = useCars();
    const { favorites, addFavorites, removeFromData } = useFavorites();
    const userId = getUserIdFromToken() ? getUserIdFromToken() : null;

    const { isDarkMode } = useDarkMode(); // Hook modo oscuro

    useEffect(() => {
        const getCarsAndFavorites = async () => {
          setLoading(true);
          try {
            await getFavorites(userId, addFavorites); 
            await carList(addCars); 
            setLoading(false);
          } catch (error) {
            toast.error("No se pudieron cargar los coches o los favoritos. Intenta más tarde.");
            setLoading(false);
          }
        };
    
        getCarsAndFavorites();
    }, []);

    useEffect(() => {  
        setMyCars(cars.filter(car => car.user.id == userId));
    }, [cars, userId]);

    // Clases para modo oscuro
    const bgMain = isDarkMode ? "bg-[#1C1C1E] text-white" : "bg-[#F5EFEB] text-black";

    return (
      <div className={`${bgMain} p-5 min-h-screen transition-colors duration-300`}>
          <CarCards 
            cars={myCars} 
            loading={loading} 
            addFavorites={addFavorites} 
            removeFromData={removeFromData} 
            showEditDeleteButtons={true}  
          />
      </div>
    )
}

export default SeeCars