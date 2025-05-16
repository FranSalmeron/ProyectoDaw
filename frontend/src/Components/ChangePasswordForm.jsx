import { useState } from "react";
import { toast } from "react-toastify";
import { changeUserPassword } from "../helpers/UserHelper";
import { useDarkMode } from "../context/DarkModeContext"; // importa tu hook/contexto

const ChangePasswordForm = ({ userId }) => {
  const { isDarkMode } = useDarkMode();

  const [currentPassword, setCurrentPassword] = useState("");
  const [newPassword, setNewPassword] = useState("");
  const [confirmPassword, setConfirmPassword] = useState("");

  const handlePasswordChange = async (e) => {
    e.preventDefault();

    if (newPassword !== confirmPassword) {
      toast.error("Las contraseñas no coinciden");
      return;
    }

    try {
      await changeUserPassword(userId, currentPassword, newPassword);
      toast.success("Contraseña cambiada con éxito");

      setCurrentPassword("");
      setNewPassword("");
      setConfirmPassword("");
    } catch (error) {
      toast.error(error.message || "Error al cambiar la contraseña");
    }
  };

  // Clases condicionales para modo oscuro
  const textColor = isDarkMode ? "text-gray-300" : "text-gray-700";
  const inputBg = isDarkMode ? "bg-gray-800 text-white border-gray-600" : "bg-white text-black border-gray-300";
  const buttonBg = isDarkMode ? "bg-blue-700 hover:bg-blue-800" : "bg-blue-600 hover:bg-blue-700";

  return (
    <div className={`mt-10 border-t pt-6 ${isDarkMode ? "border-gray-700" : "border-gray-200"}`}>
      <h2 className={`text-xl font-bold mb-4 ${textColor}`}>Cambiar Contraseña</h2>
      <form onSubmit={handlePasswordChange}>
        <div className="mb-4">
          <label className={`block font-semibold ${textColor}`}>
            Contraseña actual
          </label>
          <input
            type="password"
            value={currentPassword}
            onChange={(e) => setCurrentPassword(e.target.value)}
            className={`w-full p-2 rounded-md border ${inputBg}`}
            required
          />
        </div>
        <div className="mb-4">
          <label className={`block font-semibold ${textColor}`}>Nueva contraseña</label>
          <input
            type="password"
            value={newPassword}
            onChange={(e) => setNewPassword(e.target.value)}
            className={`w-full p-2 rounded-md border ${inputBg}`}
            required
          />
        </div>
        <div className="mb-4">
          <label className={`block font-semibold ${textColor}`}>
            Confirmar nueva contraseña
          </label>
          <input
            type="password"
            value={confirmPassword}
            onChange={(e) => setConfirmPassword(e.target.value)}
            className={`w-full p-2 rounded-md border ${inputBg}`}
            required
          />
        </div>
        <button
          type="submit"
          className={`p-2 rounded-md text-white ${buttonBg}`}
        >
          Cambiar contraseña
        </button>
      </form>
    </div>
  );
};

export default ChangePasswordForm;