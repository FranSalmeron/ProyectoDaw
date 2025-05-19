const symfonyUrl = import.meta.env.VITE_API_URL
import { toast } from 'react-toastify'; 

// Obtener todos los coches
export const carList = async (addCars, page = 1, limit = 10) => {
  try {
    const storedData = localStorage.getItem('cachedCars');
    const now = new Date();
    const minutes = 1 * 60 * 1000;

    if (storedData) {
      const { cars, lastUpdated } = JSON.parse(storedData);

      if (now - new Date(lastUpdated) < minutes) {
        cars.forEach(car => addCars(car));
      } else {
        console.log("La caché ha caducado. Actualizando datos...");
        await fetchAndStoreCars(addCars, page, limit);
      }
    } else {
      await fetchAndStoreCars(addCars, page, limit);
    }
  } catch (error) {
    console.error("Error al obtener coches: ", error);
  }
};


// Función para hacer la petición y almacenar los coches junto con el timestamp
const fetchAndStoreCars = async (addCars, page = 1, limit = 10) => {
  try {
    console.log("cargando coches desde la API...");
    const response = await fetch(`${symfonyUrl}/car/?page=${page}&limit=${limit}`);
    if (!response.ok) {
      throw new Error('Error fetching cars');
    }
    const data = await response.json();
    console.log(data);
    if (Array.isArray(data.cars) && data.cars.length > 0) {
      // Guardamos los datos en localStorage con el timestamp de la última actualización
      const newData = {
        cars: data.cars,
        lastUpdated: new Date().toISOString(),  // Guardamos la fecha actual
        totalCars: data.totalCars,
        totalPages: data.totalPages,
        currentPage: data.currentPage
      };
      console.log(newData);
      localStorage.setItem('cachedCars', JSON.stringify(newData));
      data.cars.forEach(car => addCars(car));  // Agregar los coches a la lista
    } else {
        console.log(data);
        console.log(response);
      console.error("No hay coches disponibles o la respuesta no es un array válido");
    }
  } catch (error) {
    console.error("Error al obtener coches: ", error);
  }
};

// Obtener coches por usuario
export const carByUser = async (userId) => {
    try {
        const response = await fetch(`${symfonyUrl}/car/user/${userId}`);
        if (!response.ok) {
            throw new Error('Error fetching cars by user');
        }
        const data = await response.json();
        return data;
    } catch (error) {
        console.error("Error: "+ error);
    }
}

// Obtener un coche por su ID
export const carById = async (carId) => {
    try {
        const response = await fetch(`${symfonyUrl}/car/${carId}`);
        if (!response.ok) {
            throw new Error('Error fetching car by id');
        }
        const data = await response.json();
        return data;
    } catch (error) {
        console.error("Error: "+ error);
    }
}

// Editar coche
export const editCar = async (carId, carData) => {
    try {
        const response = await fetch(`${symfonyUrl}/car/${carId}/edit`, {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(carData),
        });
        if (!response.ok) {
            throw new Error('Error editing car');
        }

        const result = await response.json();

        if (result.status === 'success') {
            toast.success("Coche editado correctamente");  
        } else {
            toast.error('Error al editar el coche');
        }
        return null;
    } catch (error) {
        console.error("Error: "+ error);
    }
}

// Eliminar coche
export const deleteCar = async (carId) => {
    try {
        const response = await fetch(`${symfonyUrl}/car/${carId}/delete`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
            },
        });

        if (response.ok) {
            const result = await response.json();

            if (result.status === 'success') {
                toast.success("Coche eliminado correctamente");
            } else {
                toast.error('Error al eliminar el coche');
            }
        } else {
            toast.error('Error al eliminar el coche');
        }
    } catch (error) {
        console.error("Error: ", error);
    }
};