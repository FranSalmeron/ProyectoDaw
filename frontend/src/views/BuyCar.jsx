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

  const userId = getUserIdFromToken();
  const [isLoading, setIsLoading] = useState(true);
  const [error, setError] = useState(null);
  const [paymentStatus, setPaymentStatus] = useState("idle");
  const [invoiceNumber] = useState(() => `INV-${Date.now()}`);

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
        className={`p-8 max-w-2xl mx-auto border rounded-lg shadow-md ${
          isDarkMode
            ? "bg-[#2C2C2E] border-gray-600"
            : "bg-white border-gray-300"
        }`}
      >
        {/* LOGO y encabezado */}
        <div className="flex justify-between items-center mb-6">
          <img
            src="images/logo-b.png"
            alt="Logo de la empresa"
            className="w-32 h-auto"
          />
          <div className="text-right">
            <h2 className="text-xl font-bold">Factura de Compra</h2>
            <p className="text-sm">N°: {invoiceNumber}</p>
            <p className="text-sm">Fecha: {new Date().toLocaleDateString()}</p>
          </div>
        </div>

        {/* Datos del comprador */}
        <div className="mb-6">
          <h3 className="font-semibold text-lg mb-2">Datos del comprador:</h3>
          <p>
            <strong>Nombre:</strong> {user?.name || "N/A"}
          </p>
          <p>
            <strong>Email:</strong> {user?.email || "N/A"}
          </p>
          <p>
            <strong>Dirección:</strong> {user?.address || "N/A"}
          </p>
        </div>

        {/* Datos del coche */}
        <div className="mb-6">
          <h3 className="font-semibold text-lg mb-2">Detalles del vehículo:</h3>
          <p>
            <strong>Marca:</strong> {car?.brand}
          </p>
          <p>
            <strong>Modelo:</strong> {car?.model}
          </p>
          <p>
            <strong>Año:</strong> {car?.manufacture_year}
          </p>
          <p>
            <strong>Kilometraje:</strong> {car?.mileage} km
          </p>
          <p>
            <strong>Precio:</strong> {car?.price} €
          </p>
        </div>

        {/* Total */}
        <div className="mb-6 text-right">
          <h3 className="text-lg font-bold">Total a pagar: {car?.price} €</h3>
        </div>

        {/* Firma */}
        <div className="mt-8 text-right">
          <em>Firma del comprador: _____________________</em>
        </div>

        {/* Botones */}
        <div className="mt-8 flex flex-col items-center gap-4">
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
            <>
              <p className="text-green-500 font-semibold">
                ✅ Pago realizado con éxito
              </p>
              <button
                onClick={() => window.print()}
                className="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition"
              >
                Imprimir Factura
              </button>
            </>
          )}
        </div>
      </div>
    </div>
  );
};

export default BuyCar;
