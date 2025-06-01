import { createContext, useContext, useState } from "react";
import { toast } from "react-toastify";

// creamos el contexto.
const CarContext = createContext();

export function CarProvider({ children }) {
  const [cars, setCars] = useState([]); 

  const addCars = (newCar) => {
    // Verificar si el coche ya está en el estado
    if (cars.some((p) => p?.id === newCar.id)) {
      return;
    }
    // Añadir el nuevo coche al estado
    setCars((prevCars) => [...prevCars, newCar]);
  };

  const removeFromData = (carId) => {
    setCars((prevCars) => prevCars.filter((p) => p?.id !== carId));
    toast.info("Coche eliminado de la data", {
      style: {
        background: "blue",
        color: "white",
        border: "1px solid black",
      },
      icon: "🗑️",
    });
  };

  const clearCars = () => setCars([]);

  return (
    <CarContext.Provider value={{ cars, addCars, removeFromData, clearCars }}>
      {children}
    </CarContext.Provider>
  );
}

//// ------------ Hook para consumir el contexto ------------
export const useCars = () => {
  const context = useContext(CarContext);
  if (context === undefined) {
    throw new Error("useCar debe ser usado dentro de un CarProvider");
  }
  return context;
};
