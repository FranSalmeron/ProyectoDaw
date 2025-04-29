import React, { useState, useRef, useEffect } from "react";
import { toast } from "react-toastify";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";
import Slider from "react-slick";
import { getUserIdFromToken } from "../helpers/decodeToken";
import { useNavigate, useLocation } from "react-router-dom";
import { addFavorite, removeFavorite } from "../helpers/favoriteHelper";
import { useFavorites } from "../context/FavoriteContext";
import { MapContainer, TileLayer, Marker } from "react-leaflet";
import L from "leaflet";
import "leaflet/dist/leaflet.css";
import { isAdmin } from "../helpers/decodeToken";
import { editCar } from "../helpers/carHelper";

const CarDetails = () => {
  const [selectedImageIndex, setSelectedImageIndex] = useState(0);
  const sliderRef = useRef(null);
  const [toastShown, setToastShown] = useState(false); // Estado para controlar el toast
  const navigate = useNavigate();
  const location = useLocation(); // Usamos useLocation para obtener el estado de la navegación
  const { favorites, addFavorites, removeFromData } = useFavorites();
  const userId = getUserIdFromToken() ? getUserIdFromToken() : null;

  const [car, setCar] = useState(location.state?.car);

  // Mostrar el toast solo si el coche no está disponible y asegurarse de que solo se muestre una vez
  useEffect(() => {
    if (!car && !toastShown) {
      setToastShown(true); // Aseguramos que el toast solo se muestre una vez
      toast.error("No se ha proporcionado un coche para mostrar");
      navigate("/"); // Redirigir a la página de inicio si no se proporciona un coche
    }
  }, [car, toastShown, navigate]);

  // Comprobar si el coche está en la lista de favoritos
  const isFavorite = (carId) => {
    return favorites.some((fav) => fav.car && fav.car.id === carId);
  };

  // Función para manejar el clic en favoritos
  const handleFavoriteClick = async (e, carId) => {
    e.stopPropagation(); // Prevenir que el clic del corazón dispare el clic de la tarjeta

    try {
      if (isFavorite(carId)) {
        const currentFavorite = favorites.find(
          (fav) => fav.car && fav.car.id === carId
        );
        const remove = await removeFavorite(
          userId,
          currentFavorite.id,
          removeFromData
        );
        if (remove) {
          toast.success("Coche eliminado de favoritos.");
          return;
        }
        toast.error("Error al eliminar el coche de favoritos.");
        return;
      } else {
        const add = await addFavorite(userId, carId, addFavorites);
        if (!add) {
          toast.error("Error al añadir el coche a favoritos.");
        }
        toast.success("Coche añadido a favoritos.");
      }
    } catch (error) {
      console.error("Error al manejar el clic en favoritos:", error);
      toast.error("Error al manejar el clic en favoritos.");
    }
  };

  // Configuración del carrusel
  const settings = {
    dots: true,
    infinite: false,
    speed: 500,
    slidesToShow: 1,
    slidesToScroll: 1,
    selectedSlide: selectedImageIndex,
    nextArrow: <div className="slick-next">→</div>,
    prevArrow: <div className="slick-prev">←</div>,
  };

  // Función para cambiar la imagen principal
  const handleImageClick = (index) => {
    setSelectedImageIndex(index);
    sliderRef.current.slickGoTo(index);
  };

  const handleBanClick = async () => {
    try {
      const newCarData = {
        carSold: car.CarSold == "baneado" ? "subido" : "baneado", // Cambia entre "baneado" y "subido"
      };

      // Actualizar el estado local del coche de inmediato
      setCar((prevCar) => ({
        ...prevCar,
        CarSold: newCarData.carSold,
      }));

      // Simular la llamada a la API para actualizar el coche
      const result = await editCar(car.id, newCarData);
      if (result) {
        const message =
          newCarData.carSold == "baneado"
            ? "Coche baneado correctamente."
            : "Coche desbaneado correctamente.";
        toast.success(message);
      }
    } catch (error) {
      console.error("Error al banear el coche: ", error);
      toast.error("Error al banear el coche.");
    }
  };

  // Verificar si el usuario está autenticado
  const isAuthenticated = () => {
    const token = localStorage.getItem("jwt");
    return token ? true : false;
  };

  // Función para manejar el clic en "Comprar"
  const handleBuyClick = () => {
    if (!isAuthenticated()) {
      toast.error("Debes estar registrado para comprar.");
      navigate("/login"); // Redirigir al login si no está autenticado
    } else {
      toast.success("Redirigiendo a la página de compra.");
      navigate("/buy_car", { state: { car } }); // Redirige a la página de compra
    }
  };

  const carIcon = new L.Icon({
    iconUrl: "/images/marcador.png",
    iconSize: [32, 32],
    iconAnchor: [16, 32],
    popupAnchor: [0, -32],
  });

  // Función para manejar el clic en "Chatear"
  const handleChatClick = () => {
    if (!isAuthenticated()) {
      toast.error("Debes estar registrado para chatear.");
      navigate("/login"); // Redirige al login si no está autenticado
    } else {
      const currentUserId = getUserIdFromToken();
      navigate("/chat", {
        state: {
          userId: currentUserId,
          carId: car?.id,
          buyerId: car?.user.id,
        },
      });
    }
    // Redirige a la página de chat
  };

  // Si no se pasa el coche como estado, mostramos un mensaje de error.
  if (!car) {
    return <div>No se ha encontrado el coche</div>;
  }

  return (
    <div className="bg-[#F5EFEB] p-6">
      <div className="car-details p-6 max-w-4xl mx-auto bg-white rounded-lg shadow-lg mt-6 mb-6">
        {/* Carrusel de imágenes */}
        <div className="car-images mb-6">
          <Slider ref={sliderRef} {...settings}>
            {car.images.map((image, index) => (
              <div key={index}>
                <img
                  src={image}
                  alt={`Car image ${index + 1}`}
                  className="w-full h-100 object-cover rounded-lg shadow-md"
                />
              </div>
            ))}
          </Slider>
        </div>

        {/* Fila de miniaturas de imágenes */}
        <div className="image-thumbnails flex space-x-4 overflow-x-auto mb-6">
          {car.images.map((image, index) => (
            <div
              key={index}
              className="w-20 h-20 cursor-pointer"
              onClick={() => handleImageClick(index)} // Actualiza la imagen seleccionada
            >
              <img
                src={image}
                alt={`Thumbnail ${index + 1}`}
                className={`w-full h-full object-cover rounded-lg hover:opacity-80 ${
                  selectedImageIndex === index ? "border-4 border-blue-500" : ""
                }`} // Resalta la miniatura seleccionada
              />
            </div>
          ))}
        </div>
        {car.user.roles.includes("ROLE_BANNED") && (
          <div className="text-red-600 font-semibold">
            ⚠ Este vendedor ha sido baneado y podría no responder.
          </div>
        )}
        <div className="car-info mt-6">
          {/* Fila con Marca, Modelo y el Icono de Favoritos */}
          <div className="flex items-center justify-between">
            <div>
              <h1 className="text-3xl font-semibold text-gray-800 mb-2">
                {car.brand} {car.model}
              </h1>
              <h2 className="text-lg text-gray-500 mb-4">
                Vendedor: {car.user.name}
              </h2>
            </div>

            {/* Icono de favoritos */}
            {userId && (
              <div>
                <button
                  className="text-white cursor-pointer"
                  onClick={(e) => handleFavoriteClick(e, car.id)}
                >
                  <img
                    src={
                      isFavorite(car.id)
                        ? "/images/corazon-relleno.png"
                        : "/images/corazon-vacio.png"
                    }
                    alt="Corazón"
                    className="w-10 h-10"
                  />
                </button>
              </div>
            )}
          </div>

          {/* Información del coche */}
          <div className="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div className="car-detail-item">
              <p className="text-gray-700 font-semibold">Ubicacion:</p>
              <p className="text-gray-500">{car.city}</p>
            </div>
            <div className="car-detail-item">
              <p className="text-gray-700 font-semibold">Precio:</p>
              <p className="text-gray-500">{car.price} €</p>
            </div>
            <div className="car-detail-item">
              <p className="text-gray-700 font-semibold">Año:</p>
              <p className="text-gray-500">{car.manufacture_year}</p>
            </div>
            <div className="car-detail-item">
              <p className="text-gray-700 font-semibold">Kilómetros:</p>
              <p className="text-gray-500">{car.mileage} km</p>
            </div>
            <div className="car-detail-item">
              <p className="text-gray-700 font-semibold">Combustible:</p>
              <p className="text-gray-500">{car.fuelType}</p>
            </div>
            <div className="car-detail-item">
              <p className="text-gray-700 font-semibold">Condición:</p>
              <p className="text-gray-500">{car.CarCondition}</p>
            </div>
            <div className="car-detail-item">
              <p className="text-gray-700 font-semibold">Tracción:</p>
              <p className="text-gray-500">{car.traction}</p>
            </div>
            <div className="car-detail-item">
              <p className="text-gray-700 font-semibold">Puertas:</p>
              <p className="text-gray-500">{car.doors}</p>
            </div>
            <div className="car-detail-item">
              <p className="text-gray-700 font-semibold">Asientos:</p>
              <p className="text-gray-500">{car.seats}</p>
            </div>
            <div className="car-detail-item">
              <p className="text-gray-700 font-semibold">Transmisión:</p>
              <p className="text-gray-500">{car.transmission}</p>
            </div>
            <div className="car-detail-item">
              <p className="text-gray-700 font-semibold">Color:</p>
              <p className="text-gray-500">{car.color}</p>
            </div>
            <div className="car-detail-item">
              <p className="text-gray-700 font-semibold">Fecha Publicación:</p>
              <p className="text-gray-500">
                {new Date(car.publication_date).toLocaleDateString()}
              </p>
            </div>
            <div className="car-detail-item">
              <p className="text-gray-700 font-semibold">Descripcion:</p>
              <p className="text-gray-500">{car.description}</p>
            </div>
          </div>
        </div>

        {/* Mapa para seleccionar ubicación */}
        <div className="mb-4 mt-4" style={{ height: "300px" }}>
          <MapContainer
            center={[car.lat, car.lon]}
            zoom={13}
            scrollWheelZoom={false}
            style={{ height: "100%", width: "100%" }}
          >
            <TileLayer url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png" />
            <Marker position={[car.lat, car.lon]} icon={carIcon} />
          </MapContainer>
        </div>

        {/* Botones de acción */}
        <div className="car-actions mt-6 flex justify-between">
          <button
            onClick={handleBuyClick}
            className="btn bg-[#43697a] text-white p-3 rounded-md w-1/3 hover:bg-[#567C8D] m-2"
          >
            Comprar
          </button>
          {isAdmin() && (
              <button
                onClick={handleBanClick}
                className="btn bg-red-600 text-white p-3 rounded-md w-1/3 hover:bg-red-700 m-2"
              >
                {car.CarSold == "baneado" ? "Desbanear Coche" : "Banear Coche"}
              </button>
          )}
          <button
            onClick={handleChatClick}
            className="btn bg-[#0E566A] text-white p-3 rounded-md w-1/3 hover:bg-[#42AEB5] m-2"
          >
            Chatear
          </button>
        </div>
      </div>
    </div>
  );
};

export default CarDetails;
