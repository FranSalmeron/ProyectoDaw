import { useEffect, useState } from 'react';
import { getUserInfo, updateUser, deleteUser } from '../helpers/UserHelper'; 
import { getUserIdFromToken } from '../helpers/decodeToken';
import { useNavigate } from 'react-router-dom';
import { toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';


const UserProfile = () => {
    const [userInfo, setUserInfo] = useState(null);
    const [isLoading, setIsLoading] = useState(true);
    const [isEditing, setIsEditing] = useState(false);
    const [userData, setUserData] = useState({ name: '', email: '', address: '', phone: '' });
    const [isDeleting, setIsDeleting] = useState(false); 
    const [error, setError] = useState(null);
    const userId = getUserIdFromToken ? getUserIdFromToken() : null;
    const navigate = useNavigate(); 

    useEffect(() => {
        const fetchUserInfo = async () => {
            try {
                const data = await getUserInfo(userId);
                setUserInfo(data);
                setUserData({
                    name: data.name,
                    email: data.email,
                    address: data.address,
                    phone: data.phone,
                });
            } catch (error) {
                setError('Error al obtener los datos del usuario');
                console.error(error);
            } finally {
                setIsLoading(false);
            }
        };

        if (userId) {
            fetchUserInfo();
        }
    }, [userId]);

    const handleEditClick = () => {
        setIsEditing(!isEditing);
    };

    const handleDeleteClick = async () => {
        if (isDeleting) return; // Evita múltiples clics mientras se elimina
        setIsDeleting(true);
        try {
            await deleteUser(userId);
            toast.success("Cuenta eliminada exitosamente");
            navigate('/'); // Redirige al inicio después de eliminar la cuenta
        } catch (error) {
            toast.success("Error al eliminar la cuenta");
            console.error(error);
        } finally {
            setIsDeleting(false);
        }
    };

    const handleSubmitEdit = async (e) => {
        e.preventDefault();
        if (!userData.name || !userData.email || !userData.address || !userData.phone) {
            setError('Por favor, complete todos los campos.');
            return;
        }
        try {
            // Hacemos la actualización del usuario
            const updatedUserResponse = await updateUser(userId, userData);

            // Si la respuesta es exitosa, actualizamos la UI con los nuevos datos
            if (updatedUserResponse && updatedUserResponse.status === 'ok') {
                // No es necesario crear un nuevo objeto de usuario si el backend ya devolvió la respuesta con los datos
                setUserInfo({ ...userInfo, ...userData });
                setIsEditing(false);
                toast.success("Datos actualizados correctamente");
            } else {
                setError('Error al actualizar los datos del usuario');
            }
        } catch (error) {
            setError('Error al actualizar los datos');
            console.error(error);
        }
    };

    if (isLoading) {
        return <div className="text-center">Cargando...</div>;
    }

    return (
        <div className="container mx-auto p-6 bg-[#F5EFEB] min-h-screen">
            <div className="bg-white p-8 rounded-lg shadow-md">
                <h1 className="text-3xl font-bold text-center text-gray-800 mb-6">Perfil de Usuario</h1>
                {error && <p className="text-red-500 text-center mb-4">{error}</p>}
                {isEditing ? (
                    <form onSubmit={handleSubmitEdit}>
                        <div className="mb-4">
                            <label htmlFor="name" className="block text-gray-700 font-semibold">Nombre</label>
                            <input
                                type="text"
                                id="name"
                                value={userData.name}
                                onChange={(e) => setUserData({ ...userData, name: e.target.value })}
                                className="w-full p-2 border border-gray-300 rounded-md"
                                required
                            />
                        </div>
                        <div className="mb-4">
                            <label htmlFor="email" className="block text-gray-700 font-semibold">Correo Electrónico</label>
                            <input
                                type="email"
                                id="email"
                                value={userData.email}
                                onChange={(e) => setUserData({ ...userData, email: e.target.value })}
                                className="w-full p-2 border border-gray-300 rounded-md"
                                required
                            />
                        </div>
                        <div className="mb-4">
                            <label htmlFor="address" className="block text-gray-700 font-semibold">Dirección</label>
                            <textarea
                                id="address"
                                value={userData.address}
                                onChange={(e) => setUserData({ ...userData, address: e.target.value })}
                                className="w-full p-2 border border-gray-300 rounded-md"
                                rows="4"
                                required
                            ></textarea>
                        </div>
                        <div className="mb-4">
                            <label htmlFor="phone" className="block text-gray-700 font-semibold">Teléfono</label>
                            <textarea
                                id="phone"
                                value={userData.phone}
                                onChange={(e) => setUserData({ ...userData, phone: e.target.value })}
                                className="w-full p-2 border border-gray-300 rounded-md"
                                rows="4"
                                required
                            ></textarea>
                        </div>
                        <div className="flex justify-between">
                            <button
                                type="submit"
                                className="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600"
                            >
                                Guardar cambios
                            </button>
                            <button
                                type="button"
                                onClick={handleEditClick}
                                className="bg-gray-500 text-white p-2 rounded-md hover:bg-gray-600"
                            >
                                Cancelar
                            </button>
                        </div>
                    </form>
                ) : (
                    <div>
                        <div className="text-gray-700">
                            <p><strong>Nombre:</strong> {userInfo.name}</p>
                            <p><strong>Correo Electrónico:</strong> {userInfo.email}</p>
                            <p><strong>Dirección:</strong> {userInfo.address}</p>
                            <p><strong>Teléfono:</strong> {userInfo.phone}</p>
                        </div>
                        <div className="mt-6 flex justify-between">
                            <button
                                onClick={handleEditClick}
                                className="bg-yellow-500 text-white p-2 rounded-md hover:bg-yellow-600"
                            >
                                Editar
                            </button>
                            <button
                                onClick={handleDeleteClick}
                                className={`bg-red-500 text-white p-2 rounded-md hover:bg-red-600 ${isDeleting ? 'cursor-not-allowed opacity-50' : ''}`}
                                disabled={isDeleting}
                            >
                                {isDeleting ? 'Eliminando...' : 'Eliminar Cuenta'}
                            </button>
                        </div>
                    </div>
                )}
            </div>
        </div>
    );
};

export default UserProfile;
