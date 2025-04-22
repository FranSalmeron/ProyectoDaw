import { toast } from "react-toastify";

const symfonyUrl = import.meta.env.VITE_API_URL;

const getUserIdFromToken = () => {
  const token = localStorage.getItem("jwt");
  if (!token) return null;

  try {
    const payload = JSON.parse(atob(token.split(".")[1]));
    return payload?.userId || payload?.username || null;
  } catch (error) {
    console.error("Error al decodificar el token JWT:", error);
    return null;
  }
};

const isAdmin = () => {
  const token = localStorage.getItem("jwt");
  if (!token) return false;

  try {
    const payload = JSON.parse(atob(token.split(".")[1]));
    return Array.isArray(payload?.roles) && payload.roles.includes("ROLE_ADMIN");
  } catch (error) {
    console.error("Error al verificar el rol admin:", error);
    return false;
  }
};


const isBanned = () => {
  const token = localStorage.getItem("jwt");
  if (!token) return false;

  try {
    const payload = JSON.parse(atob(token.split(".")[1]));
    return Array.isArray(payload?.roles) && payload.roles.includes("ROLE_BANNED");
  } catch (error) {
    console.error("Error al verificar el rol admin:", error);
    return false;
  }
};

const isTokenExpired = async (token) => {
  if (!token) return false;

  try {
    const payload = JSON.parse(atob(token.split(".")[1]));
    const currentTime = Math.floor(Date.now() / 1000);

    if (payload.exp && payload.exp < currentTime) {
      toast.info("Regenerando token");
      const refreshSuccess = await refreshTokenHandler(localStorage.getItem("refreshToken"));
      if (refreshSuccess) {
        toast.info("Token regenerado");
        window.location.reload();
        return false;
      }
      return true;
    }

    return false;
  } catch (error) {
    console.error("Error al verificar expiración del token:", error);
    const refreshSuccess = await refreshTokenHandler(localStorage.getItem("refreshToken"));
    return refreshSuccess ? false : true;
  }
};

const refreshTokenHandler = async (refreshToken) => {
  if (!refreshToken) return false;

  try {
    const response = await fetch(`${symfonyUrl}/api/refreshToken`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ refreshToken }),
    });

    const data = await response.json();

    if (response.ok && data.token) {
      localStorage.setItem("jwt", data.token);
      return true;
    } else {
      console.error("Fallo al refrescar el token");
      return false;
    }
  } catch (error) {
    console.error("Error al refrescar el token:", error);
    return false;
  }
};

export { getUserIdFromToken, isTokenExpired, refreshTokenHandler, isAdmin, isBanned };
