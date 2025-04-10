import React from 'react';
import { useNavigate } from 'react-router-dom';
import { toast } from 'react-toastify';
import { addFavorite, removeFavorite } from '../helpers/favoriteHelper'; // Importar las funciones necesarias
import { useFavorites } from '../context/FavoriteContext';
import { getUserIdFromToken } from '../helpers/decodeToken';

const CarImage = ({ car }) => {
  return (
    <div className="relative w-full h-48 overflow-hidden">
      {car.images && car.images.length > 0 ? (
        <img
          src={car.images[0]} // Usamos la primera imagen tal cual
          alt={`${car.brand} ${car.model}`}
          className="w-auto h-auto object-cover"
        />
      ) : (
        <p>No hay imágenes disponibles</p>
      )}
    </div>
  );
};
const CarCards = ({ cars, loading, addFavorites, removeFromData }) => {
  const { favorites } = useFavorites();
  const userId = getUserIdFromToken() ? getUserIdFromToken() : null;
  const navigate = useNavigate();

  const isFavorite = (carId) => {
    return favorites.some(fav => fav.car && fav.car.id === carId);
  };

  const handleFavoriteClick = async (e, carId) => {
    e.stopPropagation(); // Prevenir que el clic del corazón dispare el clic de la tarjeta

    try {
      if (isFavorite(carId)) {
        const currentFavorite = favorites.find(fav => fav.car && fav.car.id === carId);
        const remove = await removeFavorite(userId, currentFavorite.id, removeFromData);
        if(remove) {
          toast.success('Coche eliminado de favoritos.');
          return;
        }
        toast.error('Error al eliminar el coche de favoritos.');
        return;
      } else {
        const add = await addFavorite(userId, carId, addFavorites);
        if(!add) {
          toast.error('Error al añadir el coche a favoritos.');
        }
        toast.success('Coche añadido a favoritos.');
      }
    } catch (error) {
      console.error('Error al manejar el clic en favoritos:', error);
      toast.error('Error al manejar el clic en favoritos.');
    }
  };

  // Función para formatear la marca
  const formatBrand = (brand) => {
    if (!brand) return "";
    // Reemplaza guiones bajos por espacio y convierte las dos primeras letras de cada palabra en mayúscula
    return brand
      .split('_')
      .map(word => word.charAt(0).toUpperCase() + word.slice(1).toLowerCase()) // Capitaliza la primera letra de cada palabra
      .join(' '); // Une las palabras con espacio
  };

  return (
    <div className="w-full min-h-screen overflow-y-auto mb-4 sm:mb-0 relative z-10">
      <h3 className="text-xl font-semibold mb-4">Coches Disponibles:</h3>
      {loading ? (
        <p>Cargando Coches...</p>
      ) : cars && cars.length > 0 ? (
        <ul className="space-y-6">
          {/* Filtramos los coches que ya están vendidos */}
          {cars.filter(car => !car.CarSold).map((car, index) => (
            <li key={index} className="bg-white p-4 shadow-md rounded-lg relative">
              <div className="cursor-pointer" onClick={() => navigate(`/car_details`, { state: { car } })}>
                {/* Primer fila: Marca, Modelo y Precio */}
                <div className="flex w-full mb-4">
                  <div className="flex-1">
                    <h4 className="text-lg font-semibold">{formatBrand(car.brand)} {car.model}</h4>
                  </div>
                  <div className="flex-none">
                    <p className="text-black-500"><strong>{car.price} €</strong></p>
                  </div>
                </div>
  
                {/* Segunda fila: Imagen y Características */}
                <div className="flex w-full">
                  <div className="w-50 h-auto mr-4">
                    <CarImage car={car} />
                  </div>
                  <div className="flex-1">
                    <ul className="space-y-2">
                      <li className="text-black-500"><strong>Ubicación:</strong> {car.city}</li>
                      <li className="text-black-500"><strong>Condición:</strong> {car.CarCondition}</li>
                      <li className="text-black-500"><strong>Año:</strong> {car.manufacture_year}</li>
                      <li className="text-black-500"><strong>Kilómetros:</strong> {car.mileage} km</li>
                      <li className="text-black-500"><strong>Combustible:</strong> {car.fuelType}</li>
                    </ul>
                  </div>
                </div>
              </div>
  
              {/* Corazón (solo si el usuario está registrado) y al final de la tarjeta */}
              {userId != null && (
                <div className="absolute bottom-2 right-2">
                  <button className={`text-white cursor-pointer`} onClick={(e) => handleFavoriteClick(e, car.id)}>
                    <img
                      src={isFavorite(car.id) ? '/images/corazon-relleno.png' : '/images/corazon-vacio.png'}
                      alt="Corazón"
                      className="w-6 h-6"
                    />
                  </button>
                </div>
              )}
            </li>
          ))}
        </ul>
      ) : (
        <p>No hay coches disponibles en este momento.</p>
      )}
    </div>
  );
}

export default CarCards;
