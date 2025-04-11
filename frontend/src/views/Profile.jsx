import { useState, useEffect } from "react";
import { getUserInfo, updateUser, deleteUser } from "../helpers/UserHelper";
import { getUserIdFromToken } from "../helpers/decodeToken";
import { useNavigate } from "react-router-dom";
import { toast } from "react-toastify";
import { useUser } from "../context/UserContext";
import "react-toastify/dist/ReactToastify.css";
import UserProfileForm from "../components/UserProfileForm";
import ChangePasswordForm from "../components/ChangePasswordForm";

const Profile = () => {
  const [userInfo, setUserInfo] = useState(null);
  const [isLoading, setIsLoading] = useState(true);
  const [isEditing, setIsEditing] = useState(false);
  const [isPasswordVisible, setIsPasswordVisible] = useState(false);
  const [userData, setUserData] = useState({
    name: "",
    email: "",
    address: "",
    phone: "",
  });
  const [error, setError] = useState(null);
  const userId = getUserIdFromToken ? getUserIdFromToken() : null;
  const navigate = useNavigate();
  const { user, addUser, removeUserData } = useUser();

  useEffect(() => {
    const fetchUserInfo = async () => {
      setIsLoading(true);
      if (userId) {
        try {
          const data = await getUserInfo(user, userId, addUser);
          if (data) {
            setUserInfo(data);
            setUserData({
              name: data.name,
              email: data.email,
              address: data.address,
              phone: data.phone,
            });
          }
        } catch (error) {
          setError("Error al obtener los datos del usuario");
          console.error(error);
        } finally {
          setIsLoading(false);
        }
      }
    };
    fetchUserInfo();
  }, [userId]);

  const handleEditClick = () => {
    setIsEditing(!isEditing);
  };

  // Función para guardar los cambios de los datos del usuario
  const handleSubmitEdit = async (e) => {
    e.preventDefault();
    if (!userData.name || !userData.email || !userData.address || !userData.phone) {
      setError("Por favor, complete todos los campos.");
      return;
    }

    try {
      const updatedUserResponse = await updateUser(userId, userData);
      if (updatedUserResponse && updatedUserResponse.status === "ok") {
        setUserInfo({ ...userInfo, ...userData });
        addUser(updatedUserResponse);
        setIsEditing(false);
        toast.success("Datos actualizados correctamente");
      } else {
        setError("Error al actualizar los datos del usuario");
      }
    } catch (error) {
      setError("Error al actualizar los datos");
      console.error(error);
    }
  };

  const handleDeleteClick = async () => {
    try {
      await deleteUser(userId);
      removeUserData();
      toast.success("Cuenta eliminada exitosamente");
      navigate("/");
    } catch (error) {
      toast.error("Error al eliminar la cuenta");
    }
  };

  const togglePasswordVisibility = () => {
    setIsPasswordVisible(!isPasswordVisible);
  };

  if (isLoading) {
    return <div className="text-center">Cargando...</div>;
  }

  return (
    <div className="container mx-auto p-6 bg-[#F5EFEB] min-h-screen min-w-screen">
      <div className="bg-white p-8 rounded-lg shadow-md">
        <h1 className="text-3xl font-bold text-center text-gray-800 mb-6">
          Perfil de Usuario
        </h1>
        {error && <p className="text-red-500 text-center mb-4">{error}</p>}
        {isEditing ? (
          <UserProfileForm
            userData={userData}
            setUserData={setUserData}
            handleSubmitEdit={handleSubmitEdit}
            handleEditClick={handleEditClick}
          />
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
                className="bg-red-500 text-white p-2 rounded-md hover:bg-red-600"
              >
                Eliminar Cuenta
              </button>
            </div>
            <div className="mt-6">
              <button
                onClick={togglePasswordVisibility}
                className="bg-blue-600 text-white p-2 rounded-md hover:bg-blue-700"
              >
                {isPasswordVisible ? "Cancelar cambio de contraseña" : "Cambiar Contraseña"}
              </button>
              {isPasswordVisible && <ChangePasswordForm userId={userId} />}
            </div>
          </div>
        )}
      </div>
    </div>
  );
};

export default Profile;
