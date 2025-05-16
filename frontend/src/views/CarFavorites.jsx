import React, { useEffect, useState } from 'react';
import { toast } from 'react-toastify';
import { useFavorites } from '../context/FavoriteContext';
import { getUserIdFromToken } from '../helpers/decodeToken';
import { getFavorites } from '../helpers/favoriteHelper';
import { carList } from '../helpers/carHelper';
import { useCars } from '../context/CarContext';
import CarCards from '../components/CarCards';
import LoadingSpinner from '../components/LoadingSpinner/LoadingSpinner';
import { useDarkMode } from '../context/DarkModeContext';

const CarFavorites = () => {
  const { favorites, addFavorites, removeFromData } = useFavorites();
  const userId = getUserIdFromToken() || null;
  const [loading, setLoading] = useState(true);
  const [favoriteCars, setFavoriteCars] = useState([]);
  const { cars, addCars } = useCars();
  const { isDarkMode } = useDarkMode();

  useEffect(() => {
    const getCarsAndFavorites = async () => {
      setLoading(true);
      try {
        await getFavorites(userId, addFavorites);
        await carList(addCars);

        const favoriteCarsData = cars.filter(car =>
          favorites.some(fav => fav.car.id === car.id)
        );

        setFavoriteCars(favoriteCarsData);
      } catch (error) {
        toast.error('No se pudieron cargar los coches o los favoritos. Intenta más tarde.');
      } finally {
        setLoading(false);
      }
    };

    if (userId) {
      getCarsAndFavorites();
    }
  }, [cars]);

  const bgMain = isDarkMode ? "bg-[#1C1C1E] text-white" : "bg-[#F5EFEB] text-black";

  return (
    <div className={`${bgMain} p-5 min-h-screen transition-colors duration-300`}>
      <div className="w-full overflow-hidden">
        <h3 className="text-xl font-semibold mb-4">Mis Favoritos:</h3>

        {loading ? (
          <LoadingSpinner />
        ) : favoriteCars.length > 0 ? (
          <CarCards
            cars={favoriteCars}
            loading={loading}
            addFavorites={addFavorites}
            removeFromData={removeFromData}
          />
        ) : (
          <p>No tienes coches en tus favoritos.</p>
        )}
      </div>
    </div>
  );
};

export default CarFavorites;