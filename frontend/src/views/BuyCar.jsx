import React, { useState, useEffect } from "react";
import { useLocation } from "react-router-dom";
import { useUser } from "../context/UserContext";
import { getUserInfo } from "../helpers/UserHelper";
import { getUserIdFromToken } from "../helpers/decodeToken";
import { buyCar } from "../helpers/BuyHelper";
import { useCars } from "../context/CarContext";
import { toast } from "react-toastify";
import LoadingSpinner from "../components/LoadingSpinner/LoadingSpinner";
import { useDarkMode } from "../context/DarkModeContext";

const BuyCar = () => {
  const location = useLocation();
  const { car } = location.state || {};
  const { user, addUser } = useUser();
  const { clearCars } = useCars();
  const { isDarkMode } = useDarkMode();

  const userId = getUserIdFromToken ? getUserIdFromToken() : null;
  const [isLoading, setIsLoading] = useState(true);
  const [error, setError] = useState(null);
  const [paymentStatus, setPaymentStatus] = useState("idle");

  useEffect(() => {
    const fetchUserInfo = async () => {
      setIsLoading(true);

      if (userId) {
        try {
          await getUserInfo(user, userId, addUser);
        } catch (err) {
          setError("Error al obtener los datos del usuario");
          console.error(err);
        } finally {
          setIsLoading(false);
        }
      }
    };

    fetchUserInfo();
  }, [userId]);

  const handlePurchase = async () => {
    if (paymentStatus !== "idle") return;

    if (userId === car.user.id) {
      toast.error("No puedes comprar tu propio coche");
      return;
    }

    setPaymentStatus("processing");

    await buyCar(car.id, userId, car.price);

    setTimeout(() => {
      setPaymentStatus("completed");
      localStorage.removeItem("cachedCars");
      localStorage.removeItem("myCars");
      clearCars();
    }, 2000);
  };

  if (isLoading) {
    return <LoadingSpinner />;
  }

  if (error) {
    return <div className="text-center mt-10 text-red-500">{error}</div>;
  }

  return (
    <div
      className={`min-h-screen p-6 transition-colors ${
        isDarkMode ? "bg-[#1C1C1E] text-white" : "bg-[#F5EFEB] text-black"
      }`}
    >
      <div
        className={`p-8 max-w-md mx-auto border rounded-lg shadow-md ${
          isDarkMode
            ? "bg-[#2C2C2E] border-gray-600"
            : "bg-white border-gray-300"
        }`}
      >
        <h2 className="text-xl font-semibold text-center mb-6">
          Recibo de Compra
        </h2>

        <div className="mb-4">
          <strong>Marca:</strong> <span>{car?.brand || "N/A"}</span>
        </div>
        <div className="mb-4">
          <strong>Modelo:</strong> <span>{car?.model || "N/A"}</span>
        </div>
        <div className="mb-4">
          <strong>Precio:</strong> <span>{car?.price}€</span>
        </div>
        <div className="mb-4">
          <strong>Dirección:</strong> <span>{user?.address || "N/A"}</span>
        </div>
        <div className="mb-4">
          <strong>Correo:</strong> <span>{user?.email || "N/A"}</span>
        </div>

        <div className="mt-8 text-right">
          <em>Firma: _____________________</em>
        </div>
        <div className="mt-2 text-right">
          <em>Fecha: {new Date().toLocaleDateString()}</em>
        </div>

        <div className="mt-6 flex flex-col items-center gap-4">
          {paymentStatus === "idle" && (
            <button
              onClick={handlePurchase}
              className="px-4 py-2 bg-[#43697a] text-white rounded hover:bg-[#567C8D] transition"
            >
              Comprar
            </button>
          )}
          {paymentStatus === "processing" && (
            <div className="text-center">
              <LoadingSpinner />
              <p className="text-yellow-500 font-medium">Procesando pago...</p>
            </div>
          )}
          {paymentStatus === "completed" && (
            <p className="text-green-500 font-semibold">
              ✅ Pago realizado con éxito
            </p>
          )}

          <button
            onClick={() => window.print()}
            className="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition"
          >
            Imprimir Recibo
          </button>
        </div>
      </div>
    </div>
  );
};

export default BuyCar;