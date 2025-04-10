import React, { useEffect, useState } from 'react';
import { toast } from 'react-toastify';
import { useFavorites } from '../context/FavoriteContext';
import { getUserIdFromToken } from '../helpers/decodeToken';
import { getFavorites } from '../helpers/favoriteHelper';
import { carList } from '../helpers/carHelper';
import { useCars } from '../context/CarContext';
import CarCards from '../components/CarCards';

const CarFavorites = () => {
  const { favorites, addFavorites, removeFromData } = useFavorites();
  const userId = getUserIdFromToken() ? getUserIdFromToken() : null;
  const [loading, setLoading] = useState(true);
  const [favoriteCars, setFavoriteCars] = useState([]);
  const { cars, addCars } = useCars();

  useEffect(() => {
    const getCarsAndFavorites = async () => {
      setLoading(true);
      try {
        // Obtener los favoritos del usuario
        await getFavorites(userId, addFavorites); // Obtén y agrega los favoritos al contexto

        // Obtener todos los coches
        await carList(addCars); 

        // Filtrar solo los coches favoritos usando carIds
        const favoriteCarsData = cars.filter(car => 
          favorites.some(fav => fav.car.id === car.id) // Compara carId.id (en el favorito) con id (en el coche)
        );

        setFavoriteCars(favoriteCarsData); // Establece los coches favoritos
        setLoading(false);
      } catch (error) {
        toast.error('No se pudieron cargar los coches o los favoritos. Intenta más tarde.');
        setLoading(false);
      }
    };

    if (userId) {
      getCarsAndFavorites();
    }
  }, [cars]); // Añadimos dependencias al useEffect

  return (
    <div class="bg-[#F5EFEB] p-5 min-h-screen">
    <div className="w-full overflow-hidden"> 
      <h3 className="text-xl font-semibold mb-4">Mis Favoritos:</h3>

      {loading ? (
        <p>Cargando coches favoritos...</p> // Mensaje de carga mientras se obtienen los datos
      ) : favoriteCars.length > 0 ? (
        <CarCards
          cars={favoriteCars}
          loading={loading}
          addFavorites={addFavorites}
          removeFromData={removeFromData}
        />
      ) : (
        <p>No tienes coches en tus favoritos.</p> // Mensaje cuando no hay coches favoritos
      )}
    </div>
    </div>
  );
};

export default CarFavorites;