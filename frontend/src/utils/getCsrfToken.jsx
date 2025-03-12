const symfonyUrl = import.meta.env.VITE_API_URL

export const getCsrfToken = async () => {
    try {
      const response = await fetch(`${symfonyUrl}/csrf-token`);
      const data = await response.json();
      return data.csrfToken; // Retornamos el token CSRF
    } catch (error) {
      console.error('Error obteniendo el CSRF token:', error);
    }
};