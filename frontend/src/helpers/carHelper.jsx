const symfonyUrl = import.meta.env.VITE_API_URL
import { toast } from 'react-toastify'; 

// Obtener todos los coches
export const carList = async (addCars) => {
    try {
        // Primero, revisamos si hay datos en el localStorage
        const storedData = localStorage.getItem('cachedCars');
        
        const now = new Date();
        const minutes = 5 * 60 * 1000; 
        // Si existe cachedData en localStorage
        if (storedData) {
            const { cars, lastUpdated } = JSON.parse(storedData);  // Desestructuramos el objeto

            // Verificamos si los datos son válidos y si no ha pasado el tiempo de expiración
            if (now - new Date(lastUpdated) < minutes) {
                cars.forEach(car => addCars(car));  // Agregamos los coches desde localStorage
            } else {
                // Si han pasado más de 30 minutos, necesitamos actualizar los datos
                console.log("La caché ha caducado. Actualizando datos...");
                await fetchAndStoreCars(addCars);
            }
        } else {
            // Si no hay datos en localStorage, hacer la petición a la API
            await fetchAndStoreCars(addCars);
        }
    } catch (error) {
        console.error("Error al obtener coches: ", error);
    }
};

// Función para hacer la petición y almacenar los coches junto con el timestamp
const fetchAndStoreCars = async (addCars) => {
    try {
        const response = await fetch(`${symfonyUrl}/car/`);
        if (!response.ok) {
            throw new Error('Error fetching cars');
        }
        const data = await response.json();
        if (Array.isArray(data) && data.length > 0) {
            // Guardamos los datos en localStorage con el timestamp de la última actualización
            const newData = {
                cars: data,
                lastUpdated: new Date().toISOString()  // Guardamos la fecha actual
            };
            localStorage.setItem('cachedCars', JSON.stringify(newData));
            data.forEach(car => addCars(car));
        } else {
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
            localStorage.removeItem('cachedCars'); // Limpiar caché al editar un coche
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
                localStorage.removeItem('cachedCars');
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