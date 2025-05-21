import { useState, useEffect } from "react";
import { getUserInfo, updateUser, deleteUser } from "../helpers/UserHelper";
import { getUserIdFromToken } from "../helpers/decodeToken";
import { useNavigate } from "react-router-dom";
import { toast } from "react-toastify";
import { useUser } from "../context/UserContext";
import "react-toastify/dist/ReactToastify.css";
import UserProfileForm from "../components/UserProfileForm";
import ChangePasswordForm from "../components/ChangePasswordForm";
import LoadingSpinner from "../components/LoadingSpinner/LoadingSpinner";
import { useDarkMode } from "../context/DarkModeContext"; // Importar el contexto de modo oscuro

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
  const { isDarkMode } = useDarkMode(); // Obtener el estado de modo oscuro

  // Aplicar clases según el modo oscuro
  const bgMain = isDarkMode ? "bg-[#2C2C2E] text-white" : "bg-[#F5EFEB] text-black";
  const bgCard = isDarkMode ? "bg-[#1C1C1E]" : "bg-white";
  const borderStyle = isDarkMode ? "border-gray-700" : "border-gray-300";

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
    if (
      !userData.name ||
      !userData.email ||
      !userData.address ||
      !userData.phone
    ) {
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
    return (
      <div className="flex justify-center items-center">
        <LoadingSpinner /> {/* Usamos un spinner mientras se carga */}
      </div>
    );
  }

  return (
    <div className={`${bgMain} p-6 min-h-screen`}>
      <div className={`p-8 rounded-lg shadow-md border ${bgCard} ${borderStyle}`}>
        <h1 className="text-3xl font-bold text-center mb-6">
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
            <div>
              <p>
                <strong>Nombre:</strong> {userInfo.name}
              </p>
              <p>
                <strong>Correo Electrónico:</strong> {userInfo.email}
              </p>
              <p>
                <strong>Dirección:</strong> {userInfo.address}
              </p>
              <p>
                <strong>Teléfono:</strong> {userInfo.phone}
              </p>
            </div>
            <div className="mt-6 flex flex-wrap gap-4 items-center">
              <button
                onClick={handleEditClick}
                className="bg-[#0E566A] text-white p-2 rounded-md hover:bg-[#42AEB5]"
              >
                Editar
              </button>
              <button
                onClick={togglePasswordVisibility}
                className="bg-[#43697a] text-white p-2 rounded-md hover:bg-[#567C8D]"
              >
                {isPasswordVisible
                  ? "Cancelar cambio de contraseña"
                  : "Cambiar Contraseña"}
              </button>
              <button
                onClick={handleDeleteClick}
                className="bg-red-500 text-white p-2 rounded-md hover:bg-red-600 ml-auto"
              >
                Eliminar Cuenta
              </button>
            </div>

            {isPasswordVisible && (
              <div className="mt-4">
                <ChangePasswordForm userId={userId} />
              </div>
            )}
          </div>
        )}
      </div>
    </div>
  );
};

export default Profile;
