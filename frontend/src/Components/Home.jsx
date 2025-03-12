import React, { useEffect, useState } from 'react';
import { MapContainer, TileLayer, Marker, Popup } from 'react-leaflet';
import { ToastContainer } from 'react-toastify';
import 'leaflet/dist/leaflet.css';
import { carList } from '../helpers/carHelper.jsx';
import { CsrfProvider } from '../helpers/csrfContext.jsx';

const Home = () => {
  const [cars, setCars] = useState([]);
  const [position, setPosition] = useState([37.1775, -3.5986]); // Coordenadas predeterminadas

  // Usamos useEffect para obtener la ubicación al cargar el componente y obtener los coches
  useEffect(() => {
    const getCars = async () => {
      const data = await carList();
      if (data && Array.isArray(data)) {
        setCars(data); 
      } else {
        console.error('No se pudo obtener una lista de coches');
      }
    };

    getCars();

    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          // Si obtenemos la ubicación, actualizamos el estado con las nuevas coordenadas
          const { latitude, longitude } = position.coords;
          setPosition([latitude, longitude]);
        },
        (error) => {
          console.error("Error al obtener la ubicación", error);
        }
      );
    } else {
      console.log("Geolocalización no soportada en este navegador.");
    }
  }, []);

  const CarImage = ({ car }) => {
    return (
      <div className="relative w-full h-48 overflow-hidden">
        <img
          src={car.images && car.images.length > 0 ? car.images[0] : '/path/to/default-image.jpg'} // Si no hay imagen, mostrar imagen por defecto
          alt="Car"
          className="w-full h-full object-cover"
        />
      </div>
    );
  };

  return (
    <CsrfProvider>
       <ToastContainer />
       <div className="flex justify-between p-4">
      <div className="w-2/3 overflow-y-auto h-screen pr-4">
        <h1 className="text-4xl font-bold text-center text-gray-800 mb-6">Bienvenido a RenovAuto</h1>
        <h3 className="text-xl font-semibold mb-4">Coches Disponibles</h3>
        <ul className="space-y-6">
          {cars.length > 0 ? (
            cars.map((car, index) => (
              <li key={index} className="bg-white p-4 shadow-md rounded-lg flex flex-col items-center">
                <h4 className="text-lg font-semibold">{car.brand} {car.model}</h4>
                <div className="w-48 h-48">
                  <CarImage car={car} />
                </div>
                <a
                  href={`/car/${car.id}`}
                  className="mt-2 text-blue-500 hover:underline"
                >
                  Ver más detalles
                </a>
              </li>
            ))
          ) : (
            <li>No hay coches disponibles</li>
          )}
        </ul>
      </div>

      <div className="w-1/3 h-screen">
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
          <Marker position={position}>
            <Popup>
              Estás aquí. <br /> ¡Bienvenido a RenovAuto!
            </Popup>
          </Marker>

          {cars.map((car, index) => (
            car.lat && car.lon && (
              <Marker key={index} position={[car.lat, car.lon]}>
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
