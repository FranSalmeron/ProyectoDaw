import React, { useEffect, useState } from 'react';
import { MapContainer, TileLayer, Marker, Popup } from 'react-leaflet';
import L from 'leaflet';
import { ToastContainer, toast } from 'react-toastify';
import 'leaflet/dist/leaflet.css';
import { carList } from '../helpers/carHelper';
import { useCars } from '../context/CarContext';
import { useNavigate } from "react-router-dom";
import { addFavorite, removeFavorite } from '../helpers/favoriteHelper'; // Importar las funciones necesarias
import { getUserIdFromToken } from '../helpers/decodeToken';

const Home = () => {
  const { cars, addCars } = useCars();
  const [position, setPosition] = useState([37.1775, -3.5986]);
  const [loading, setLoading] = useState(true);
  const [favorites, setFavorites] = useState([]); // Para manejar los favoritos del usuario
  const navigate = useNavigate();

  // Obtener el userId del token
  const userId = getUserIdFromToken() ? getUserIdFromToken() : null;

  useEffect(() => {
    const getCars = async () => {
      setLoading(true);
      try {
        await carList(addCars);
        setLoading(false);
      } catch (error) {
        toast.error('No se pudieron cargar los coches. Intenta más tarde.');
        setLoading(false);
      }
    };

    getCars();

    // Obtener la ubicación geográfica
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          const { latitude, longitude } = position.coords;
          setPosition([latitude, longitude]);
        },
        (error) => {
          console.error('Error al obtener la ubicación', error);
          toast.error('No se pudo obtener tu ubicación.');
        }
      );
    } else {
      toast.error('Geolocalización no soportada en este navegador.');
    }

  }, []); // Solo se ejecuta cuando el componente se monta

  // El componente ahora solo muestra la imagen sin redimensionarla
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

  const handleCarClick = (car) => {
    navigate(`/car_details`, { state: { car } });
  };

  const carIcon = new L.Icon({
    iconUrl: '/images/marcador.png',
    iconSize: [32, 32],
    iconAnchor: [16, 32],
    popupAnchor: [0, -32],
  });

  const personIcon = new L.Icon({
    iconUrl: '/images/personita.png',
    iconSize: [32, 32],
    iconAnchor: [16, 32],
    popupAnchor: [0, -32],
  });

  const carsAvailable = Array.isArray(cars) && cars.length > 0;

  const isFavorite = (carId) => {
    return favorites.some(fav => fav.car.id === carId); // Compara el ID del coche con los favoritos
  };

  const handleFavoriteClick = async (e, carId) => {
    e.stopPropagation(); // Prevenir que el clic del corazón dispare el clic de la tarjeta
    if (isFavorite(carId)) {
      // Si el coche ya es favorito, lo eliminamos
      const favorite = favorites.find(fav => fav.car.id === carId);
      if (favorite) {
        await removeFavorite(userId, carId);  // Pasar el userId y carId en lugar de favorite.id
        setFavorites(favorites.filter(fav => fav.car.id !== carId)); // Actualiza el estado
      }
    } else {
      // Si el coche no es favorito, lo añadimos
      await addFavorite(userId, carId);  // Añadir a favoritos
      setFavorites([...favorites, { car: cars.find(car => car.id === carId) }]); // Actualiza el estado con el nuevo favorito
    }
  };  

  return (
    <>
      <ToastContainer />
      <div className="flex flex-col sm:flex-row p-4 relative z-0">
        {/* Lista de coches */}
        <div className="w-full overflow-y-auto h-90 sm:h-screen mb-4 sm:mb-0 order-2 sm:order-1 relative z-10">
          <h3 className="text-xl font-semibold mb-4">Coches Disponibles:</h3>
          {loading ? (
            <p>Cargando Coches...</p>
          ) : carsAvailable ? (
            <ul className="space-y-6">
              {cars.map((car, index) => (
                <li key={index} className="bg-white p-4 shadow-md rounded-lg relative">
                  <div className="cursor-pointer" onClick={() => handleCarClick(car)}>
                    {/* Primera fila: Marca, Modelo y Precio */}
                    <div className="flex w-full mb-4">
                      <div className="flex-1">
                        <h4 className="text-lg font-semibold">{car.brand} {car.model}</h4>
                      </div>
                      <div className="flex-none">
                        <p className="text-gray-500">{car.price} €</p>
                      </div>
                    </div>

                    {/* Segunda fila: Imagen y Características */}
                    <div className="flex w-full">
                      <div className="w-50 h-auto mr-4">
                        <CarImage car={car} />
                      </div>
                      <div className="flex-1">
                        <ul className="space-y-2">
                          <li className="text-gray-500">Ubicación: {car.city}</li>
                          <li className="text-gray-500">Condición: {car.CarCondition}</li>
                          <li className="text-gray-500">Año: {car.manufacture_year}</li>
                          <li className="text-gray-500">Kilómetros: {car.mileage} km</li>
                          <li className="text-gray-500">Combustible: {car.fuelType}</li>
                        </ul>
                      </div>
                    </div>
                  </div>

                  {/* Corazón (solo si el usuario está registrado) y al final de la tarjeta */}
                  {userId && (
                    <div className="absolute bottom-2 right-2">
                      <button 
                        className={`text-white cursor-pointer`}
                        onClick={(e) => handleFavoriteClick(e, car.id)}
                      >
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

        {/* Mapa */}
        <div className="w-full sm:w-3/5 h-80 sm:h-screen pl-4 sm:pl-8 order-1 sm:order-2 relative z-0">
          <MapContainer
            center={position}
            zoom={13}
            scrollWheelZoom={false}
            style={{ height: '100%', width: '100%' }}
          >
            <TileLayer
              attribution='&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
              url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
            />
            <Marker position={position} icon={personIcon}>
              <Popup>
                Estás aquí. <br /> ¡Bienvenido a RenovAuto!
              </Popup>
            </Marker>

            {carsAvailable && cars.map((car, index) => (
              car.lat && car.lon && (
                <Marker key={index} position={[car.lat, car.lon]} icon={carIcon}>
                  <Popup>
                    {car.brand} {car.model}
                    <br />
                    {car.description || 'Sin descripción'}
                  </Popup>
                </Marker>
              )
            ))}
          </MapContainer>
        </div>
      </div>
    </>
  );
};

export default Home;
