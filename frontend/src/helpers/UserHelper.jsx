const symfonyUrl = import.meta.env.VITE_API_URL; 

// Función para obtener todos los usuarios, jwt y solo accesible a admin
export const getUsers = async () => {

    try {
        const response = await fetch(`${symfonyUrl}/user/`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${localStorage.getItem('jwt')}`, 
            },
        });

        const data = await response.json();

        if (response.ok) {
            return data; 
        } else {
            throw new Error(data.error || 'Error al obtener usuarios');
        }
    } catch (error) {
        console.error(error);
        throw error;
    }
};

// Función para registrar un nuevo usuario
export const createUser = async (userData) => {
    try {
        const response = await fetch(`${symfonyUrl}/user/new`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(userData),
        });

        const data = await response.json();

        if (response.ok) {
            return data; 
        } else {
            throw new Error(data.error || 'Error al registrar el usuario');
        }
    } catch (error) {
        console.error(error);
        throw error;
    }
};

// Función para obtener la información de un usuario
export const getUserInfo = async (userId) => {
    try {
        const response = await fetch(`${symfonyUrl}/user/${userId}/info`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
            },
        });

        const data = await response.json();

        if (response.ok) {
            return data; 
        } else {
            throw new Error(data.error || 'Error al obtener la información del usuario');
        }
    } catch (error) {
        console.error(error);
        throw error;
    }
};

// Función para editar un usuario,
export const updateUser = async (userId, userData) => {
    try {
        const response = await fetch(`${symfonyUrl}/user/${userId}/edit`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${localStorage.getItem('jwt')}`, 
            },
            body: JSON.stringify(userData),
        });

        const data = await response.json();

        if (response.ok) {
            return data;
        } else {
            throw new Error(data.error || 'Error al actualizar el usuario');
        }
    } catch (error) {
        console.error(error);
        throw error;
    }
};

// Función para eliminar un usuario,
export const deleteUser = async (userId) => {
    try {
        const response = await fetch(`${symfonyUrl}/user/${userId}/delete`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${localStorage.getItem('jwt')}`,
            },
        });

        const data = await response.json();

        if (response.ok) {
            localStorage.removeItem('jwt'); 
            localStorage.removeItem('refreshToken');
            localStorage.removeItem('username');
            localStorage.removeItem("cachedChats");
            return data; 
        } else {
            throw new Error(data.error || 'Error al eliminar el usuario');
        }
    } catch (error) {
        console.error(error);
        throw error;
    }
};

// Función para alternar el rol de admin, jwt, solo accesible a admin
export const toggleAdmin = async (userId) => {
    try {
        const response = await fetch(`${symfonyUrl}/user/${userId}/toggle-admin`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${localStorage.getItem('jwt')}`,
            },
        });

        const data = await response.json();

        if (response.ok) {
            return data; 
        } else {
            throw new Error(data.error || 'Error al actualizar el rol de admin');
        }
    } catch (error) {
        console.error(error);
        throw error;
    }
};

// Función para alternar el rol de baneado, jwt, solo accesible a admin
export const toggleBanned = async (userId) => {
    try {
        const response = await fetch(`${symfonyUrl}/user/${userId}/toggle-banned`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${localStorage.getItem('jwt')}`,
            },
        });

        const data = await response.json();

        if (response.ok) {
            return data;
        } else {
            throw new Error(data.error || 'Error al actualizar el rol de baneado');
        }
    } catch (error) {
        console.error(error);
        throw error;
    }
};