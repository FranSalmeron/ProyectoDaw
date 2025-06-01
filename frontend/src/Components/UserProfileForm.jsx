import { useDarkMode } from "../context/DarkModeContext"; // importa tu hook/contexto

const UserProfileForm = ({ userData, setUserData, handleSubmitEdit, handleEditClick }) => {
  const { isDarkMode } = useDarkMode();

  const labelTextColor = isDarkMode ? "text-gray-300" : "text-gray-700";
  const inputBg = isDarkMode ? "bg-gray-800 text-white border-gray-600" : "bg-white text-black border-gray-300";
  const buttonSaveBg = isDarkMode ? "bg-[#43697a] hover:bg-[#567C8D]" : "bg-[#43697a] hover:bg-[#567C8D]";
  const buttonCancelBg = isDarkMode ? "bg-gray-700 hover:bg-gray-600" : "bg-gray-500 hover:bg-gray-600";

  return (
    <form onSubmit={handleSubmitEdit}>
      <div className="mb-4">
        <label htmlFor="name" className={`block font-semibold ${labelTextColor}`}>
          Nombre
        </label>
        <input
          type="text"
          id="name"
          value={userData.name}
          onChange={(e) => setUserData({ ...userData, name: e.target.value })}
          className={`w-full p-2 rounded-md border ${inputBg}`}
          required
        />
      </div>
      <div className="mb-4">
        <label htmlFor="email" className={`block font-semibold ${labelTextColor}`}>
          Correo Electrónico
        </label>
        <input
          type="email"
          id="email"
          value={userData.email}
          onChange={(e) => setUserData({ ...userData, email: e.target.value })}
          className={`w-full p-2 rounded-md border ${inputBg}`}
          required
        />
      </div>
      <div className="mb-4">
        <label htmlFor="address" className={`block font-semibold ${labelTextColor}`}>
          Dirección
        </label>
        <textarea
          id="address"
          value={userData.address}
          onChange={(e) => setUserData({ ...userData, address: e.target.value })}
          className={`w-full p-2 rounded-md border ${inputBg}`}
          rows="4"
          required
        ></textarea>
      </div>
      <div className="mb-4">
        <label htmlFor="phone" className={`block font-semibold ${labelTextColor}`}>
          Teléfono
        </label>
        <textarea
          id="phone"
          value={userData.phone}
          onChange={(e) => setUserData({ ...userData, phone: e.target.value })}
          className={`w-full p-2 rounded-md border ${inputBg}`}
          rows="4"
          required
        ></textarea>
      </div>
      <div className="flex justify-between">
        <button
          type="submit"
          className={`text-white p-2 rounded-md transition-colors duration-300 ${buttonSaveBg}`}
        >
          Guardar cambios
        </button>
        <button
          type="button"
          onClick={handleEditClick}
          className={`text-white p-2 rounded-md transition-colors duration-300 ${buttonCancelBg}`}
        >
          Cancelar
        </button>
      </div>
    </form>
  );
};

export default UserProfileForm; 