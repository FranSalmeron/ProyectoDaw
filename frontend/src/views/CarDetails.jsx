import React, { useState, useRef, useEffect } from "react";
import { toast } from "react-toastify";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";
import Slider from "react-slick";
import { getUserIdFromToken, isAdmin } from "../helpers/decodeToken";
import { useNavigate, useLocation } from "react-router-dom";
import { addFavorite, removeFavorite } from "../helpers/favoriteHelper";
import { useFavorites } from "../context/FavoriteContext";
import { MapContainer, TileLayer, Marker } from "react-leaflet";
import L from "leaflet";
import "leaflet/dist/leaflet.css";
import { editCar } from "../helpers/carHelper";
import { useCars } from "../context/CarContext";
import { useDarkMode } from "../context/DarkModeContext"; // ✅ contexto de modo oscuro

const CarDetails = () => {
  const [selectedImageIndex, setSelectedImageIndex] = useState(0);
  const sliderRef = useRef(null);
  const [toastShown, setToastShown] = useState(false);
  const navigate = useNavigate();
  const location = useLocation();
  const { favorites, addFavorites, removeFromData } = useFavorites();
  const { clearCars } = useCars();
  const userId = getUserIdFromToken() || null;
  const [car, setCar] = useState(location.state?.car);

  const { isDarkMode, toggleDarkMode } = useDarkMode(); // ✅ usamos el contexto

  useEffect(() => {
    if (!car && !toastShown) {
      setToastShown(true);
      toast.error("No se ha proporcionado un coche para mostrar");
      navigate("/");
    }
  }, [car, toastShown, navigate]);

  const isFavorite = (carId) => {
    return favorites.some((fav) => fav.car && fav.car.id === carId);
  };

  const handleFavoriteClick = async (e, carId) => {
    e.stopPropagation();

    try {
      if (isFavorite(carId)) {
        const currentFavorite = favorites.find(
          (fav) => fav.car && fav.car.id === carId
        );
        const removed = await removeFavorite(
          userId,
          currentFavorite.id,
          removeFromData
        );
        if (removed) {
          toast.success("Coche eliminado de favoritos.");
        } else {
          toast.error("Error al eliminar el coche de favoritos.");
        }
      } else {
        const added = await addFavorite(userId, carId, addFavorites);
        if (added) {
          toast.success("Coche añadido a favoritos.");
        } else {
          toast.error("Error al añadir el coche a favoritos.");
        }
      }
    } catch (error) {
      console.error("Error al manejar el clic en favoritos:", error);
      toast.error("Error al manejar el clic en favoritos.");
    }
  };

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

  const handleImageClick = (index) => {
    setSelectedImageIndex(index);
    sliderRef.current.slickGoTo(index);
  };

  const handleBanClick = async () => {
    try {
      const newCarData = {
        carSold: car.CarSold === "baneado" ? "subido" : "baneado",
      };

      setCar((prevCar) => ({
        ...prevCar,
        CarSold: newCarData.carSold,
      }));

      const result = await editCar(car.id, newCarData);
      if (result) {
        toast.success(
          newCarData.carSold === "baneado"
            ? "Coche baneado correctamente."
            : "Coche desbaneado correctamente."
        );
        localStorage.removeItem("cachedCars");
        clearCars();
      }
    } catch (error) {
      console.error("Error al banear el coche: ", error);
      toast.error("Error al banear el coche.");
    }
  };

  const isAuthenticated = () => {
    const token = localStorage.getItem("jwt");
    return !!token;
  };

  const handleBuyClick = () => {
    if (!isAuthenticated()) {
      toast.error("Debes estar registrado para comprar.");
      navigate("/login");
    } else {
      toast.success("Redirigiendo a la página de compra.");
      navigate("/buy_car", { state: { car } });
    }
  };

  const handleChatClick = () => {
    if (!isAuthenticated()) {
      toast.error("Debes estar registrado para chatear.");
      navigate("/login");
    } else {
      const currentUserId = getUserIdFromToken();
      navigate("/chat", {
        state: {
          buyerId: currentUserId,
          carId: car?.id,
          sellerId: car?.user.id,
        },
      });
    }
  };

  const carIcon = new L.Icon({
    iconUrl: "/images/marcador.png",
    iconSize: [32, 32],
    iconAnchor: [16, 32],
    popupAnchor: [0, -32],
  });

  const formatCondition = (condition) => {
    if (!condition) return "";
    return condition
      .split("_")
      .map((word) => word.charAt(0).toUpperCase() + word.slice(1))
      .join(" ");
  };

  if (!car) {
    return <div>No se ha encontrado el coche</div>;
  }

  return (
    <div
      className={`${
        isDarkMode ? "bg-[#1C1C1E] text-white" : "bg-[#F5EFEB] text-black"
      } p-6 min-h-screen`}
    >
      {/* Botón para alternar modo */}
      <button
        onClick={toggleDarkMode}
        className="mb-4 px-4 py-2 bg-gray-300 rounded"
      >
        {isDarkMode ? "Modo Claro ☀" : "Modo Oscuro 🌙"}
      </button>

      <div
        className={`car-details p-6 max-w-4xl mx-auto rounded-lg shadow-lg ${
          isDarkMode ? "bg-[#2C2C2E]" : "bg-white"
        }`}
      >
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

        {/* Miniaturas */}
        <div className="image-thumbnails flex space-x-4 overflow-x-auto mb-6">
          {car.images.map((image, index) => (
            <div
              key={index}
              className="w-20 h-20 cursor-pointer"
              onClick={() => handleImageClick(index)}
            >
              <img
                src={image}
                alt={`Thumbnail ${index + 1}`}
                className={`w-full h-full object-cover rounded-lg hover:opacity-80 ${
                  selectedImageIndex === index
                    ? "border-4 border-blue-500"
                    : ""
                }`}
              />
            </div>
          ))}
        </div>

        {/* Alerta si el vendedor está baneado */}
        {car.user.roles.includes("ROLE_BANNED") && (
          <div className="text-red-600 font-semibold">
            ⚠ Este vendedor ha sido baneado y podría no responder.
          </div>
        )}

        {/* Info */}
        <div className="car-info mt-6">
          <div className="flex items-center justify-between">
            <div>
              <h1 className="text-3xl font-semibold mb-2">
                {car.brand} {car.model}
              </h1>
              <h2 className="text-lg mb-4">Vendedor: {car.user.name}</h2>
            </div>

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

          {/* Datos del coche */}
          <div className="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
              <p className="font-semibold">Ubicación:</p>
              <p>{car.city}</p>
            </div>
            <div>
              <p className="font-semibold">Precio:</p>
              <p>{car.price} €</p>
            </div>
            <div>
              <p className="font-semibold">Año:</p>
              <p>{car.manufacture_year}</p>
            </div>
            <div>
              <p className="font-semibold">Kilómetros:</p>
              <p>{car.mileage} km</p>
            </div>
            <div>
              <p className="font-semibold">Combustible:</p>
              <p>{car.fuelType}</p>
            </div>
            <div>
              <p className="font-semibold">Condición:</p>
              <p>{formatCondition(car.CarCondition)}</p>
            </div>
            <div>
              <p className="font-semibold">Tracción:</p>
              <p>{car.traction}</p>
            </div>
            <div>
              <p className="font-semibold">Puertas:</p>
              <p>{car.doors}</p>
            </div>
            <div>
              <p className="font-semibold">Asientos:</p>
              <p>{car.seats}</p>
            </div>
            <div>
              <p className="font-semibold">Transmisión:</p>
              <p>{car.transmission}</p>
            </div>
            <div>
              <p className="font-semibold">Color:</p>
              <p>{car.color}</p>
            </div>
            <div>
              <p className="font-semibold">Fecha Publicación:</p>
              <p>{new Date(car.publication_date).toLocaleDateString()}</p>
            </div>
            <div className="sm:col-span-2">
              <p className="font-semibold">Descripción:</p>
              <p>{car.description}</p>
            </div>
          </div>
        </div>

        {/* Mapa */}
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

        {/* Botones */}
        <div className="car-actions mt-6 flex flex-col sm:flex-row justify-between">
          <button
            onClick={handleBuyClick}
            className="btn bg-[#43697a] text-white p-3 rounded-md hover:bg-[#567C8D] m-2"
          >
            Comprar
          </button>
          {isAdmin() && (
            <button
              onClick={handleBanClick}
              className="btn bg-red-600 text-white p-3 rounded-md hover:bg-red-700 m-2"
            >
              {car.CarSold === "baneado" ? "Desbanear Coche" : "Banear Coche"}
            </button>
          )}
          <button
            onClick={handleChatClick}
            className="btn bg-[#0E566A] text-white p-3 rounded-md hover:bg-[#42AEB5] m-2"
          >
            Chatear
          </button>
        </div>
      </div>
    </div>
  );
};

export default CarDetails;