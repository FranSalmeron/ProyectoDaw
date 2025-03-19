const symfonyUrl = import.meta.env.VITE_API_URL
import { toast } from 'react-toastify';  
import { useCsrfToken } from './csrfContext';

// Obtener todos los coches
export const carList = async () => {
    try {
        const response = await fetch(`${symfonyUrl}/car/`);
        if (!response.ok) {
            throw new Error('Error fetching cars');
        }
        const data = await response.json();
        return data;
    } catch (error) {
        console.error("Error: "+ error);
    }  
}

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
        const csrfToken = useCsrfToken();
        const response = await fetch(`${symfonyUrl}/car/${carId}/delete`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
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
