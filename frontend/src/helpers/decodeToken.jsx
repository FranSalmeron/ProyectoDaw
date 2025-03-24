import { toast } from "react-toastify";

const symfonyUrl = import.meta.env.VITE_API_URL

const getUserIdFromToken = () => {
    const token = localStorage.getItem('jwt');
    if (!token) {
      console.error('No se encontró el token JWT.');
      return null;
    }
  
    const tokenParts = token.split('.');
  
    // Verifica si el token tiene la estructura correcta (header.payload.signature)
    if (tokenParts.length !== 3) {
      console.error('El token JWT no tiene el formato correcto.');
      return null;
    }
  
    try {
      // Decodifica la parte del payload del token
      const payload = JSON.parse(atob(tokenParts[1]));
  
      // Verifica si el campo 'userId' o 'username' está presente
      if (payload && (payload.userId || payload.username)) {
        // Si el campo 'userId' está presente, devuélvelo. Si no, usa 'username'.
        return payload.userId || payload.username;
      } else {
        console.error('No se encontró el campo `userId` ni `username` en el token. Payload:', payload);
        return null;
      }
    } catch (error) {
      console.error('Error al decodificar el token JWT:', error);
      return null;
    }
  };
  const isTokenExpired = async (token) => {
    if (!token) {
      console.error('No se encontró el token JWT.');
      return false;
    }
  
    const tokenParts = token.split('.');
  
    // Verifica si el token tiene la estructura correcta (header.payload.signature)
    if (tokenParts.length !== 3) {
      console.error('El token JWT no tiene el formato correcto.');
      return true; // Si el token no tiene formato válido, lo consideramos expirado
    }
  
    try {
      // Decodifica la parte del payload del token
      const payload = JSON.parse(atob(tokenParts[1]));
  
      // Verifica si el campo 'exp' (expiración) está presente en el payload y si ha expirado
      const currentTime = Math.floor(Date.now() / 1000); // Obtener el tiempo actual en segundos
      if (payload.exp && payload.exp < currentTime) {
        // Si el token ha expirado, intenta refrescarlo
        toast.info("Regenerando token");
        const refreshSuccess = await refreshTokenHandler(localStorage.getItem('refreshToken'));
        if (refreshSuccess) {
          toast.info("Token regenerado");
          return false; // El token ha sido refrescado correctamente, por lo tanto no está expirado
        }
        return true; // El token ha expirado y no se pudo refrescar
      }
  
      return false; // El token no ha expirado
    } catch (error) {
      console.error('Error al decodificar el token JWT:', error);
      const refreshSuccess = await refreshTokenHandler(localStorage.getItem('refreshToken'));
      return refreshSuccess ? false : true;
    }
  };
  
  const refreshTokenHandler = async (refreshToken) => {
    if (!refreshToken) {
      console.error('No se encontró el refresh token.');
      return false; // Si no hay refresh token, no podemos refrescar el JWT
    }
  
    try {
      const response = await fetch(`${symfonyUrl}/api/refreshToken`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ refreshToken: refreshToken }),
      });
  
      const data = await response.json();
  
      if (response.ok && data.token) {
        // Si el refresh token es válido y el backend devuelve un nuevo JWT
        localStorage.setItem('jwt', data.token); // Guardamos el nuevo JWT
        return true; // El refresh token fue exitoso
      } else {
        console.error('Refresh token no válido o fallo en la respuesta del servidor.');
        return false; // El refresh token no es válido
      }
    } catch (error) {
      console.error('Error al intentar refrescar el token:', error);
      return false; // Hubo un error al intentar refrescar el token
    }
  };
  
  export { isTokenExpired, getUserIdFromToken };
  