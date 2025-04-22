import React, { useEffect, useState } from 'react'
import { useCars } from '../context/CarContext'
import CarCards from '../components/CarCards';
import { useFavorites } from '../context/FavoriteContext';
import { getUserIdFromToken } from '../helpers/decodeToken';
import { getFavorites } from '../helpers/favoriteHelper';
import { carList } from '../helpers/CarHelper';
import { toast } from 'react-toastify';


const SeeCars = () => {
    const [loading, setLoading] = useState(true);
    const [myCars, setMyCars] = useState([]);

    const { cars, addCars } = useCars();
    const { favorites, addFavorites, removeFromData } = useFavorites();
    const userId = getUserIdFromToken() ? getUserIdFromToken() : null;
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
       
  return (
    <div>
        <CarCards cars={myCars} loading={loading} addFavorites={addFavorites} removeFromData={removeFromData} showEditDeleteButtons={true}  />
        
    </div>
  )
}

export default SeeCars