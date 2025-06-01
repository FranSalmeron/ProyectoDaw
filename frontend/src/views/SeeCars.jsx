import React, { useEffect, useState } from 'react';
import CarCards from '../components/CarCards';
import { useFavorites } from '../context/FavoriteContext';
import { getUserIdFromToken } from '../helpers/decodeToken';
import { getFavorites } from '../helpers/favoriteHelper';
import { carByUser } from '../helpers/carHelper';
import { toast } from 'react-toastify';
import { useDarkMode } from '../context/DarkModeContext';

const SeeCars = () => {
  const [loading, setLoading] = useState(true);
  const [myCars, setMyCars] = useState([]);
  const { favorites, addFavorites, removeFromData } = useFavorites();
  const { isDarkMode } = useDarkMode();

  const userId = getUserIdFromToken();

  useEffect(() => {
    const fetchData = async () => {
      setLoading(true);

      try {
        // Cargar favoritos solo si están vacíos
        if (favorites.length === 0) {
          await getFavorites(userId, addFavorites);
        }

        const storedCars = localStorage.getItem("myCars");
        if (storedCars) {
          const parsedCars = JSON.parse(storedCars);
          setMyCars(parsedCars);
        } else {
          // Si no hay en localStorage, cargar de la API
          const userCars = await carByUser(userId);
          if (Array.isArray(userCars)) {
            setMyCars(userCars);
            localStorage.setItem("myCars", JSON.stringify(userCars));
          } else {
            toast.warning("No se encontraron coches asociados al usuario.");
          }
        }
      } catch (error) {
        toast.error("No se pudieron cargar los datos. Intenta más tarde.");
      } finally {
        setLoading(false);
      }
    };

    if (userId) {
      fetchData();
    } else {
      setLoading(false);
    }
  }, [userId]);

  // Modo oscuro
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
  );
};

export default SeeCars;
