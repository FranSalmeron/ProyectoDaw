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
  
  export default getUserIdFromToken;
  