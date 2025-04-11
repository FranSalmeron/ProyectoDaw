// components/UserProfileForm.js

const UserProfileForm = ({ userData, setUserData, handleSubmitEdit, handleEditClick }) => {
    return (
      <form onSubmit={handleSubmitEdit}>
        <div className="mb-4">
          <label htmlFor="name" className="block text-gray-700 font-semibold">
            Nombre
          </label>
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
          <label htmlFor="email" className="block text-gray-700 font-semibold">
            Correo Electrónico
          </label>
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
          <label htmlFor="address" className="block text-gray-700 font-semibold">
            Dirección
          </label>
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
          <label htmlFor="phone" className="block text-gray-700 font-semibold">
            Teléfono
          </label>
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
            className="bg-[#43697a] text-white p-2 rounded-md hover:bg-[#567C8D]"
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
    );
  };
  
  export default UserProfileForm;
  