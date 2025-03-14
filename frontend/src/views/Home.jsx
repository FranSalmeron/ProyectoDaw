import React, { useEffect, useState } from 'react';
import { MapContainer, TileLayer, Marker, Popup } from 'react-leaflet';
import L from 'leaflet';
import { ToastContainer } from 'react-toastify';
import 'leaflet/dist/leaflet.css';
import { carList } from '../helpers/carHelper.jsx';
import { CsrfProvider } from '../helpers/csrfContext.jsx';

const Home = ({ onSelectCar, onSelectPage }) => {
  const [cars, setCars] = useState([]);
  const [position, setPosition] = useState([37.1775, -3.5986]); // Coordenadas predeterminadas


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
        return;
      }

      // Si no tenemos coches en cache, hacemos la petición a la API
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
        console.error('No se pudo obtener una lista de coches');
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
        }
      );
    } else {
      console.log('Geolocalización no soportada en este navegador.');
    }
  }, []);

  const CarImage = ({ car }) => {
    return (
      <div class="relative w-full h-48 overflow-hidden">
        <img
          src={car.images && car.images.length > 0 ? car.images[0] : '/path/to/default-image.jpg'}
          alt="Car"
          class="w-auto h-auto object-cover"
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
    iconUrl: '/images/marcador.png', // Ruta de la imagen del marcador personalizado
    iconSize: [32, 32], // Tamaño del marcador
    iconAnchor: [16, 32], // Punto del icono donde se va a anclar el marcador
    popupAnchor: [0, -32] // Anclaje del popup
  });

  const personIcon = new L.Icon({
    iconUrl: '/images/personita.png', 
    iconSize: [32, 32],
    iconAnchor: [16, 32], 
    popupAnchor: [0, -32] 
  });


  return (
    <CsrfProvider>
      <ToastContainer />
      <div class="flex flex-col sm:flex-row p-4 relative z-0">
       {/* Lista de coches */}
    <div class="w-full overflow-y-auto h-90 sm:h-screen mb-4 sm:mb-0 order-2 sm:order-1 relative z-10">
      <h3 class="text-xl font-semibold mb-4">Coches Disponibles:</h3>
      <ul class="space-y-6">
        {cars.length > 0 ? (
          cars.map((car, index) => (
            <li key={index} class="bg-white p-4 shadow-md rounded-lg">
               <div
                class="cursor-pointer" 
                onClick={() => handleCarClick(car)} 
              >
                {/* Primera fila: Marca, Modelo y Precio */}
                <div class="flex w-full mb-4">
                  <div class="flex-1">
                    <h4 class="text-lg font-semibold">{car.brand} {car.model}</h4>
                  </div>
                  <div class="flex-none">
                    <p class="text-gray-500">{car.price} €</p>
                  </div>
                </div>

                {/* Segunda fila: Imagen y Características */}
                <div class="flex w-full">
                  {/* Imagen del coche */}
                  <div class="w-50 h-auto mr-4">
                    <CarImage car={car} />
                  </div>

                  {/* Características del coche */}
                  <div class="flex-1">
                    <ul class="space-y-2">
                    <li class="text-gray-500">Ubicacion: {car.city}</li>
                      <li class="text-gray-500">Condicion: {car.CarCondition}</li>
                      <li class="text-gray-500">Año: {car.manufacture_year}</li>
                      <li class="text-gray-500">Kilómetros: {car.mileage} km</li>
                      <li class="text-gray-500">Combustible: {car.fuelType}</li>
                    </ul>
                  </div>
                </div>
              </div>
            </li>
          ))
        ) : (
          <p>Cargando Coches.</p>
        )}
      </ul>
    </div>

        {/* Mapa */}
        <div class="w-full sm:w-3/5 h-80 sm:h-screen pl-4 sm:pl-8 order-1 sm:order-2 relative z-0">
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
            <Marker 
              position={position}
              icon={personIcon}
              >
              <Popup>
                Estás aquí. <br /> ¡Bienvenido a RenovAuto!
              </Popup>
            </Marker>

            {cars.map((car, index) => (
              car.lat && car.lon && (
                <Marker
                key={index}
                position={[car.lat, car.lon]}
                icon={carIcon} // Usamos el icono personalizado
                >
                 
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
    </CsrfProvider>
  );
}

export default Home;