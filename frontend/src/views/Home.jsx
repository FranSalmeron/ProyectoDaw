import React, { useEffect, useState } from 'react';
import { MapContainer, TileLayer, Marker, Popup } from 'react-leaflet';
import L from 'leaflet';
import { ToastContainer, toast } from 'react-toastify';
import 'leaflet/dist/leaflet.css';
import { carList } from '../helpers/carHelper.jsx';

const Home = ({ onSelectCar, onSelectPage }) => {
  const [cars, setCars] = useState([]);
  const [position, setPosition] = useState([37.1775, -3.5986]); // Coordenadas predeterminadas
  const [loading, setLoading] = useState(true); // Para mostrar un estado de carga

  // Función para obtener los coches desde localStorage
  const getCachedCars = () => {
    const cachedData = localStorage.getItem('coches');
    if (cachedData) {
      const { data, timestamp } = JSON.parse(cachedData);
      // Si los datos tienen menos de 30 minutos de antigüedad, los retornamos
      if (Date.now() - timestamp < 30 * 60 * 1000) {
        return data;
      }
    }
    return null;
  };

  useEffect(() => {
    const getCars = async () => {
      // Primero intentamos obtener los coches desde el cache
      const cachedCoches = getCachedCars();
      if (cachedCoches) {
        setCars(cachedCoches);
        setLoading(false);
        return;
      }

      // Si no tenemos coches en cache, hacemos la petición a la API
      try {
        const data = await carList();
        if (data && Array.isArray(data)) {
          setCars(data);
          // Guardamos los coches en localStorage con un timestamp
          const dataToCache = {
            data,
            timestamp: Date.now(),
          };
          localStorage.setItem('coches', JSON.stringify(dataToCache));
        } else {
          throw new Error('No se pudo obtener una lista de coches');
        }
      } catch (error) {
        console.error(error);
        toast.error('No se pudieron cargar los coches. Intenta más tarde.');
      } finally {
        setLoading(false);
      }
    };

    getCars();

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
  }, []);

  const CarImage = ({ car }) => {
    return (
      <div className="relative w-full h-48 overflow-hidden">
        <img
          src={car.images[0]}
          alt="Car"
          className="w-auto h-auto object-cover"
        />
      </div>
    );
  };

  const handleCarClick = (car) => {
    onSelectCar(car);
    onSelectPage('car-details');
  };

  // Crear un icono personalizado para el marcador
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

  return (
    <>
      <ToastContainer />
      <div className="flex flex-col sm:flex-row p-4 relative z-0">
        {/* Lista de coches */}
        <div className="w-full overflow-y-auto h-90 sm:h-screen mb-4 sm:mb-0 order-2 sm:order-1 relative z-10">
          <h3 className="text-xl font-semibold mb-4">Coches Disponibles:</h3>
          {loading ? (
            <p>Cargando Coches...</p>
          ) : cars.length > 0 ? (
            <ul className="space-y-6">
              {cars.map((car, index) => (
                <li key={index} className="bg-white p-4 shadow-md rounded-lg">
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
                          <li className="text-gray-500">Ubicacion: {car.city}</li>
                          <li className="text-gray-500">Condición: {car.CarCondition}</li>
                          <li className="text-gray-500">Año: {car.manufacture_year}</li>
                          <li className="text-gray-500">Kilómetros: {car.mileage} km</li>
                          <li className="text-gray-500">Combustible: {car.fuelType}</li>
                        </ul>
                      </div>
                    </div>
                  </div>
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

            {cars.map((car, index) => (
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
