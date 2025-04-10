const symfonyUrl = import.meta.env.VITE_API_URL

export const buyCar = async (carId, userId, price, email) => {
    try {
        const response = await fetch(`${symfonyUrl}/transaction/new`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            carId,
            userId,
            price,
        }),
        });
    
        if (!response.ok) {
        throw new Error("Error al procesar la compra");
        }
    
        const data = await response.json();
        localStorage.removeItem('cachedCars'); // Limpiar caché de coches después de la compra
        return data;
    } catch (error) {
        console.error("Error en la compra:", error);
        throw error;
    }
}