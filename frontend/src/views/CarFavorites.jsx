import React, { useEffect, useState } from 'react';
import { toast } from 'react-toastify';
import { useFavorites } from '../context/FavoriteContext';
import { getUserIdFromToken } from '../helpers/decodeToken';
import { getFavorites } from '../helpers/favoriteHelper';
import { carList } from '../helpers/carHelper';
import CarCards from '../components/CarCards';
import LoadingSpinner from '../components/LoadingSpinner/LoadingSpinner';
import { useCars } from '../context/CarContext';
import { useDarkMode } from '../context/DarkModeContext';

const CarFavorites = () => {
  const { favorites, addFavorites, removeFromData } = useFavorites();
  const { cars, addCars } = useCars(); // Contexto de coches
  const userId = getUserIdFromToken() || null;
  const [loading, setLoading] = useState(true);
  const [favoriteCars, setFavoriteCars] = useState([]);
  const { isDarkMode } = useDarkMode();

  useEffect(() => {
    const getCarsAndFavorites = async () => {
      setLoading(true);

      try {
        // Cargar coches desde el localStorage si no están en el contexto de coches
        if (!cars.length) {
          const cachedCars = localStorage.getItem("cachedCars");
          if (cachedCars) {
            const parsed = JSON.parse(cachedCars);
            parsed.cars.forEach((car) => addCars(car));
          } else {
            // Si no hay coches en el localStorage, cargarlos desde la API como en Home
            await carList(1, 10).then((page) => {
              page.cars.forEach((car) => addCars(car));
              localStorage.setItem("cachedCars", JSON.stringify({
                cars: page.cars,
                totalPages: page.totalPages,
                currentPage: 1,
                lastUpdated: new Date().toISOString(),
              }));
            });
          }
        }

        // Obtener los favoritos del usuario
        if (userId) {
          await getFavorites(userId, addFavorites); // Asocia los favoritos con el usuario
        }

        // Filtrar los coches que están en los favoritos del usuario
        const favoriteCarsData = cars.filter(car =>
          favorites.some(fav => fav.car.id == car.id)
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
  }, [userId, cars, favorites, addCars, addFavorites]); // Dependencias para recargar si los coches o favoritos cambian

  const bgMain = isDarkMode ? "bg-[#1C1C1E] text-white" : "bg-[#F5EFEB] text-black";

  return (
    <div className={bgMain + " p-5 min-h-screen transition-colors duration-300"}>
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
