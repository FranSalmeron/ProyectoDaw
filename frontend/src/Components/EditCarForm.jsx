import React, { useState } from 'react';
import { editCar } from '../helpers/carHelper';
import { toast } from 'react-toastify';
import { useCars } from '../context/CarContext';
import { useDarkMode } from '../context/DarkModeContext';  // Importa contexto modo oscuro

const EditCarForm = ({ car, onClose }) => {
  const [formData, setFormData] = useState({
    brand: car.brand || '',
    model: car.model || '',
    manufacture_year: car.manufacture_year || '',
    mileage: car.mileage || 0,
    price: car.price || 0,
    color: car.color || '',
    fuelType: car.fuelType || '',
    transmission: car.transmission || '',
    traction: car.traction || '',
    doors: car.doors || 4,
    seats: car.seats || 5,
    carCondition: car.carCondition || '',
    description: car.description || '',
    image: car.image || '',
    lat: car.lat || '',
    lon: car.lon || '',
  });
  const { clearCars } = useCars();
  
  // Obtener estado del modo oscuro
  const { isDarkMode } = useDarkMode();

  // Variables para clases según modo oscuro o claro
  const bgMain = isDarkMode ? "bg-[#1C1C1E] text-white" : "bg-[#F5EFEB] text-white";
  const cardBg = isDarkMode ? "bg-[#2C2C2E]" : "bg-[#2F4156]";
  const inputBg = isDarkMode ? "bg-gray-800 text-white" : "bg-white text-black";

  const handleChange = (e) => {
    setFormData({ ...formData, [e.target.name]: e.target.value });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();

    try {
      await editCar(car.id, formData);
      localStorage.removeItem("cachedCars");
      clearCars();
      onClose();
    } catch (error) {
      console.error("Error al editar el coche:", error);
      toast.error("Error al guardar los cambios");
    }
  };

  return (
    <div className={`${bgMain} min-h-screen p-5`}>
      <div className={`w-9/10 max-w-2xl mx-auto ${cardBg} p-8 rounded-lg shadow-lg m-5`}>
        <h2 className="text-3xl font-bold text-center mb-6">Edita los detalles del coche</h2>
        <form onSubmit={handleSubmit}>
          {/* Marca */}
          <div className="mb-4">
            <label htmlFor="brand" className="block text-lg font-medium mb-2">Marca:</label>
            <input
              type="text"
              name="brand"
              value={formData.brand}
              onChange={handleChange}
              className={`w-full p-3 rounded-lg ${inputBg} focus:outline-none focus:ring-2 focus:ring-red-500`}
            />
          </div>

          {/* Modelo */}
          <div className="mb-4">
            <label htmlFor="model" className="block text-lg font-medium mb-2">Modelo:</label>
            <input
              type="text"
              name="model"
              value={formData.model}
              onChange={handleChange}
              className={`w-full p-3 rounded-lg ${inputBg} focus:outline-none focus:ring-2 focus:ring-red-500`}
              required
            />
          </div>

          {/* Año de fabricación */}
          <div className="mb-4">
            <label htmlFor="manufacture_year" className="block text-lg font-medium mb-2">Año de fabricación:</label>
            <input
              type="number"
              name="manufacture_year"
              min="1900"
              max={new Date().getFullYear()}
              value={formData.manufacture_year}
              onChange={handleChange}
              className={`w-full p-3 rounded-lg ${inputBg} focus:outline-none focus:ring-2 focus:ring-red-500`}
              required
            />
          </div>

          {/* Kilometraje */}
          <div className="mb-4">
            <label htmlFor="mileage" className="block text-lg font-medium mb-2">Kilometraje (km):</label>
            <input
              type="number"
              name="mileage"
              value={formData.mileage}
              onChange={handleChange}
              className={`w-full p-3 rounded-lg ${inputBg} focus:outline-none focus:ring-2 focus:ring-red-500`}
              required
            />
          </div>

          {/* Precio */}
          <div className="mb-4">
            <label htmlFor="price" className="block text-lg font-medium mb-2">Precio (€):</label>
            <input
              type="number"
              name="price"
              value={formData.price}
              onChange={handleChange}
              className={`w-full p-3 rounded-lg ${inputBg} focus:outline-none focus:ring-2 focus:ring-red-500`}
              required
            />
          </div>

          {/* Color */}
          <div className="mb-4">
            <label htmlFor="color" className="block text-lg font-medium mb-2">Color:</label>
            <input
              type="text"
              name="color"
              value={formData.color}
              onChange={handleChange}
              className={`w-full p-3 rounded-lg ${inputBg} focus:outline-none focus:ring-2 focus:ring-red-500`}
            />
          </div>

          {/* Tipo de combustible */}
          <div className="mb-4">
            <label htmlFor="fuelType" className="block text-lg font-medium mb-2">Tipo de combustible:</label>
            <select
              name="fuelType"
              value={formData.fuelType}
              onChange={handleChange}
              className={`w-full p-3 rounded-lg ${inputBg} focus:outline-none focus:ring-2 focus:ring-red-500`}
              required
            >
              <option value="gasolina">Gasolina</option>
              <option value="diesel">Diesel</option>
              <option value="electrico">Eléctrico</option>
              <option value="hibrido">Híbrido</option>
            </select>
          </div>

          {/* Transmisión */}
          <div className="mb-4">
            <label htmlFor="transmission" className="block text-lg font-medium mb-2">Transmisión:</label>
            <select
              name="transmission"
              value={formData.transmission}
              onChange={handleChange}
              className={`w-full p-3 rounded-lg ${inputBg} focus:outline-none focus:ring-2 focus:ring-red-500`}
              required
            >
              <option value="manual">Manual</option>
              <option value="automatico">Automática</option>
              <option value="cvt">CVT</option>
              <option value="semi_automatico">Semi-automática</option>
            </select>
          </div>

          {/* Descripción */}
          <div className="mb-4">
            <label htmlFor="description" className="block text-lg font-medium mb-2">Descripción:</label>
            <textarea
              name="description"
              value={formData.description}
              onChange={handleChange}
              className={`w-full p-3 rounded-lg ${inputBg} focus:outline-none focus:ring-2 focus:ring-red-500`}
            />
          </div>

          {/* Botón de Enviar */}
          <div className="flex justify-center mt-4">
            <button
              type="submit"
              className="w-full py-3 bg-[#43697a] text-white rounded-lg hover:bg-[#567C8D] transition duration-300 focus:outline-none focus:ring-2 focus:ring-red-500"
            >
              Guardar Cambios
            </button>
          </div>
        </form>
      </div>
    </div>
  );
};

export default EditCarForm;