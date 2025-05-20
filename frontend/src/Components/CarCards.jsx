import React, { useState } from "react";
import { useNavigate } from "react-router-dom";
import { toast } from "react-toastify";
import { addFavorite, removeFavorite } from "../helpers/favoriteHelper";
import { useFavorites } from "../context/FavoriteContext";
import { useCars } from "../context/CarContext";
import { getUserIdFromToken, isAdmin } from "../helpers/decodeToken";
import EditCarForm from "./EditCarForm";
import { deleteCar } from "../helpers/carHelper";
import LoadingSpinner from "./LoadingSpinner/LoadingSpinner";
import transformCloudinaryUrl from "../helpers/cloudinaryHelper";
import { useDarkMode } from "../context/DarkModeContext";

const CarImage = ({ car }) => (
  <div className="relative w-full h-38 overflow-hidden mb-1">
    {car.images && car.images.length > 0 ? (
      <img
        src={transformCloudinaryUrl(car.images[0]) || "/images/logo-oscuro.png"}
        alt={`${car.brand} ${car.model}`}
        className="w-full h-full object-contain"
      />
    ) : (
      <p>No hay imágenes disponibles</p>
    )}
  </div>
);

const formatCondition = (condition) =>
  condition
    ? condition
        .split("_")
        .map((word) => word.charAt(0).toUpperCase() + word.slice(1))
        .join(" ")
    : "";

const formatBrand = (brand) =>
  brand
    ? brand
        .split("_")
        .map(
          (word) => word.charAt(0).toUpperCase() + word.slice(1).toLowerCase()
        )
        .join(" ")
    : "";

const CarCards = ({
  cars,
  loading,
  addFavorites,
  removeFromData,
  showEditDeleteButtons,
}) => {
  const [selectedCar, setSelectedCar] = useState(null);
  const { clearCars } = useCars();
  const { favorites } = useFavorites();
  const userId = getUserIdFromToken();
  const navigate = useNavigate();
  const { isDarkMode } = useDarkMode();
  console.log("cars", cars);

  const isFavorite = (carId) =>
    favorites.some((fav) => fav.car && fav.car.id === carId);

  const handleFavoriteClick = async (e, carId) => {
    e.stopPropagation();
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
      } else {
        const add = await addFavorite(userId, carId, addFavorites);
        if (!add) toast.error("Error al añadir el coche a favoritos.");
        else toast.success("Coche añadido a favoritos.");
      }
    } catch (error) {
      console.error("Error al manejar favoritos:", error);
      toast.error("Error al manejar el clic en favoritos.");
    }
  };

  const handleDelete = async (e, carId) => {
    e.stopPropagation();
    const response = await deleteCar(carId);
    if (response) {
      localStorage.removeItem("cachedCars");
      clearCars();
    }
  };

  const handleEdit = (e, car) => {
    e.stopPropagation();
    setSelectedCar(car);
  };

  const handleCloseEdit = () => {
    setSelectedCar(null);
  };

  return (
    <div
      className={`w-full ${
        isDarkMode ? "bg-[#1C1C1E] text-white" : "bg-[#F5EFEB] text-black"
      } min-h-screen overflow-y-auto mb-4 sm:mb-0 relative z-10`}
    >
      {loading ? (
        <LoadingSpinner />
      ) : (
        (() => {
          if (!cars || !Array.isArray(cars))
            return <p>Error al cargar coches.</p>;

          const visibleCars = cars.filter((car) => {
            if (isAdmin()) {
              return car.CarSold === "subido" || car.CarSold === "baneado";
            }
            if (userId === car.user.id) {
              return car.CarSold === "subido" || car.CarSold === "baneado";
            }
            return car.CarSold === "subido";
          });
          if (cars.length === 0) {
            // No se han cargado coches todavía
            return <LoadingSpinner />;
          }

          return visibleCars.length > 0 ? (
            <ul className="space-y-6">
              {visibleCars.map((car, index) => (
                <li
                  key={index}
                  className={`${
                    isDarkMode
                      ? "bg-[#2C2C2E] text-white"
                      : "bg-white text-black"
                  } p-4 shadow-md rounded-lg relative ${
                    car.CarSold === "baneado" ? "border-2 border-red-500" : ""
                  }`}
                >
                  <div
                    className="cursor-pointer"
                    onClick={() => navigate(`/car_details`, { state: { car } })}
                  >
                    {car.CarSold === "baneado" && (
                      <div
                        className={`border px-4 py-2 rounded mb-2 ${
                          isDarkMode
                            ? "bg-red-900 border-red-700 text-red-300"
                            : "bg-red-100 border-red-400 text-red-700"
                        }`}
                      >
                        🚫 Este coche ha sido baneado por un administrador.
                      </div>
                    )}

                    <div className="flex w-full mb-4">
                      <div className="flex-1">
                        <h4 className="text-lg font-semibold">
                          {formatBrand(car.brand)} {car.model}
                        </h4>
                      </div>
                      <div className="flex-none">
                        <p>
                          <strong>{car.price} €</strong>
                        </p>
                      </div>
                    </div>

                    <div className="flex flex-col sm:flex-row w-full">
                      <div className="w-50 h-auto mr-4">
                        <CarImage car={car} />
                      </div>
                      <div className="flex-1">
                        <ul className="space-y-2">
                          <li
                            className={`${
                              isDarkMode ? "text-gray-300" : "text-black-500"
                            }`}
                          >
                            <strong>Ubicación:</strong> {car.city}
                          </li>
                          <li
                            className={`${
                              isDarkMode ? "text-gray-300" : "text-black-500"
                            }`}
                          >
                            <strong>Condición:</strong>{" "}
                            {formatCondition(car.CarCondition)}
                          </li>
                          <li
                            className={`${
                              isDarkMode ? "text-gray-300" : "text-black-500"
                            }`}
                          >
                            <strong>Año:</strong> {car.manufacture_year}
                          </li>
                          <li
                            className={`${
                              isDarkMode ? "text-gray-300" : "text-black-500"
                            }`}
                          >
                            <strong>Kilómetros:</strong> {car.mileage} km
                          </li>
                          <li
                            className={`${
                              isDarkMode ? "text-gray-300" : "text-black-500"
                            }`}
                          >
                            <strong>Combustible:</strong> {car.fuelType}
                          </li>
                        </ul>
                        {showEditDeleteButtons && (
                          <div className="flex justify-between p-4">
                            <button
                              className="bg-[#43697a] text-white px-4 py-2 rounded-lg hover:bg-[#567C8D]"
                              onClick={(e) => handleEdit(e, car)}
                            >
                              Editar
                            </button>
                            <button
                              className="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600"
                              onClick={(e) => handleDelete(e, car.id)}
                            >
                              Eliminar
                            </button>
                          </div>
                        )}
                      </div>
                    </div>
                  </div>

                  {userId != null && (
                    <div className="absolute bottom-2 right-2">
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
                          className="w-6 h-6"
                        />
                      </button>
                    </div>
                  )}

                  {selectedCar && (
                    <EditCarForm car={selectedCar} onClose={handleCloseEdit} />
                  )}
                </li>
              ))}
            </ul>
          ) : (
            <p>No hay coches disponibles en este momento.</p>
          );
        })()
      )}
    </div>
  );
};

export default CarCards;
