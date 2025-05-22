const symfonyUrl = import.meta.env.VITE_API_URL

export const buyCar = async (carId, userId, price) => {
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
        return data;
    } catch (error) {
        console.error("Error en la compra:", error);
        throw error;
    }
}

export const fetchStatistics = async () => {
  try {
    const response = await fetch(`${symfonyUrl}/transaction/statistics`, {
      method: 'GET',
      headers: {
        'Content-Type': 'application/json',
        'Authorization': `Bearer ${localStorage.getItem('jwt')}`,
      },
    });

    if (!response.ok) {
      throw new Error("No se pudo obtener las estadísticas");
    }

    const data = await response.json();
    return data;

  } catch (error) {
    console.error("Error al cargar estadísticas:", error);
    throw error;
  }
};