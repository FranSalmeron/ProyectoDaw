const symfonyUrl = import.meta.env.VITE_API_URL;
import { toast } from "react-toastify";
// carHelper.js
export const carList = async (addCars, page = 1, limit = 10) => {
  try {
    const storedData = localStorage.getItem('cachedCars');
    const now = new Date();
    const cacheDuration = 1 * 60 * 1000; // 1 minuto

    if (storedData) {
      const parsed = JSON.parse(storedData);
      const isValid = now - new Date(parsed.lastUpdated) < cacheDuration;

      if (isValid) {
        return {
          cars: parsed.cars,
          totalPages: parsed.totalPages,
          currentPage: parsed.currentPage,
        };
      }
    }

    const response = await fetch(`${symfonyUrl}/car/?page=${page}&limit=${limit}`);
    if (!response.ok) throw new Error("Error al obtener coches");

    const data = await response.json();
    const cars = data.cars.map((item) => {
      const car = item[0];
      return {
        ...car,
        favorites_count: item.favorites_count ?? 0,
      };
    });

    const result = {
      cars,
      totalPages: data.totalPages,
      currentPage: data.currentPage,
    };

    localStorage.setItem("cachedCars", JSON.stringify({
      ...result,
      lastUpdated: new Date().toISOString(),
    }));
    cars.forEach((car) => {addCars(car);});
    return result;

  } catch (err) {
    console.error("Error cargando coches", err);
    return { cars: [], totalPages: 1, currentPage: 1 };
  }
};

// Obtener coches por usuario
export const carByUser = async (userId) => {
  try {
    const response = await fetch(`${symfonyUrl}/car/user/${userId}`);
    if (!response.ok) {
      throw new Error("Error fetching cars by user");
    }
    const data = await response.json();
    return data;
  } catch (error) {
    console.error("Error: " + error);
  }
};

// Obtener un coche por su ID
export const carById = async (carId) => {
  try {
    const response = await fetch(`${symfonyUrl}/car/${carId}`);
    if (!response.ok) {
      throw new Error("Error fetching car by id");
    }
    const data = await response.json();
    return data;
  } catch (error) {
    console.error("Error: " + error);
  }
};

// Editar coche
export const editCar = async (carId, carData) => {
  try {
    const response = await fetch(`${symfonyUrl}/car/${carId}/edit`, {
      method: "PATCH",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(carData),
    });
    if (!response.ok) {
      throw new Error("Error editing car");
    }

    const result = await response.json();

    if (result.status === "success") {
      toast.success("Coche editado correctamente");
    } else {
      toast.error("Error al editar el coche");
    }
    return null;
  } catch (error) {
    console.error("Error: " + error);
  }
};

// Eliminar coche
export const deleteCar = async (carId) => {
  try {
    const response = await fetch(`${symfonyUrl}/car/${carId}/delete`, {
      method: "DELETE",
      headers: {
        "Content-Type": "application/json",
      },
    });

    if (response.ok) {
      const result = await response.json();

      if (result.status === "success") {
        toast.success("Coche eliminado correctamente");
      } else {
        toast.error("Error al eliminar el coche");
      }
    } else {
      toast.error("Error al eliminar el coche");
    }
  } catch (error) {
    console.error("Error: ", error);
  }
};
