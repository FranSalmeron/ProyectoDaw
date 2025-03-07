import React, { useState, useEffect } from 'react';
import { toast, ToastContainer } from 'react-toastify';  
import 'react-toastify/dist/ReactToastify.css'; 

const symfonyUrl = import.meta.env.VITE_API_URL;

function SubmitCar() {
  const [formData, setFormData] = useState({
    brand: '',
    model: '',
    manufacture_year: '',
    mileage: '',
    price: '',
    color: '',
    fuelType: '',
    transmission: '',
    traction: '',
    doors: '',
    seats: '',
    description: '',
    publication_date: '',
    carCondition: '', 
    carSold: false,
    user: localStorage.getItem("userId"),  
    images: [],
  });

  // Establecer automáticamente la fecha de publicación como la fecha actual
  useEffect(() => {
    setFormData((prevState) => ({
      ...prevState,
      publication_date: new Date().toISOString().split('T')[0], // Formato YYYY-MM-DD
    }));
  }, []);

  // Manejar cambios en los inputs del formulario
  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData({
      ...formData,
      [name]: value,
    });
  };

  // Manejar la carga del archivo de imagen
  const handleFileChange = (e) => {
    const files = Array.from(e.target.files); 
    setFormData((prevState) => ({
      ...prevState,
      images: prevState.images ? [...prevState.images, ...files] : files,  // Concatenamos las imágenes nuevas a las existentes
    }));
  };

  // Manejar el envío del formulario
  const handleSubmit = async (e) => {
    e.preventDefault();

    // Crear FormData y añadir los datos del formulario
    const data = new FormData();
    Object.keys(formData).forEach((key) => {
      if (key === 'images' && formData.images) {
        formData.images.forEach((file) => {
          data.append('images[]', file);  // Usamos 'images[]' para enviar múltiples imágenes
        });
      } else {
        data.append(key, formData[key]);
      }
    });
    try {
      console.log(formData)
      const response = await fetch(`${symfonyUrl}/car/new`, {
        method: 'POST',
        body: data,
      });

      if (response.ok) {
        toast.success('Coche creado con éxito');
      } else {
        toast.error('Error al crear el coche');
      }
    } catch (error) {
      console.error('Hubo un error:', error);
    }
  };

  return (
    <div className="w-9/10 max-w-lg mx-auto bg-black text-white p-8 rounded-lg shadow-lg m-5">
      <h2 className="text-3xl font-bold text-center text-white-300 mb-6">Introduce los detalles del coche</h2>
      
      <form onSubmit={handleSubmit}>
        {/* Marca */}
        <div className="mb-4">
          <label htmlFor="brand" className="block text-lg font-medium mb-2">Marca:</label>
          <input
            id="brand"
            type="text"
            name="brand"
            value={formData.brand}
            onChange={handleChange}
            className="w-full p-3 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-red-500"
            placeholder="Marca del coche"
          />
        </div>

        {/* Modelo */}
        <div className="mb-4">
          <label htmlFor="model" className="block text-lg font-medium mb-2">Modelo:</label>
          <input
            id="model"
            type="text"
            name="model"
            value={formData.model}
            onChange={handleChange}
            className="w-full p-3 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-red-500"
            placeholder="Modelo del coche"
          />
        </div>

        {/* Año de fabricación */}
        <div className="mb-4">
          <label htmlFor="manufacture_year" className="block text-lg font-medium mb-2">Año de fabricación:</label>
          <input
            id="manufacture_year"
            type="number"
            name="manufacture_year"
            value={formData.manufacture_year}
            onChange={handleChange}
            className="w-full p-3 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-red-500"
            placeholder="Año de fabricación"
          />
        </div>

        {/* Kilometraje */}
        <div className="mb-4">
          <label htmlFor="mileage" className="block text-lg font-medium mb-2">Kilometraje:</label>
          <input
            id="mileage"
            type="number"
            name="mileage"
            min = "0"
            value={formData.mileage}
            onChange={handleChange}
            className="w-full p-3 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-red-500"
            placeholder="Kilometraje"
          />
        </div>

        {/* Precio */}
        <div className="mb-4">
          <label htmlFor="price" className="block text-lg font-medium mb-2">Precio:</label>
          <input
            id="price"
            type="number"
            name="price"
            step="0.01" 
            min="0"
            value={formData.price}
            onChange={handleChange}
            className="w-full p-3 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-red-500"
            placeholder="Precio del coche"
          />
        </div>

        {/* Color */}
        <div className="mb-4">
          <label htmlFor="color" className="block text-lg font-medium mb-2">Color:</label>
          <input
            id="color"
            type="text"
            name="color"
            value={formData.color}
            onChange={handleChange}
            className="w-full p-3 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-red-500"
            placeholder="Color del coche"
          />
        </div>

        {/* Tipo de combustible */}
        <div className="mb-4">
          <label htmlFor="fuelType" className="block text-lg font-medium mb-2">Tipo de combustible:</label>
          <select
            id="fuelType"
            name="fuelType"
            value={formData.fuelType}
            onChange={handleChange}
            className="w-full p-3 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-red-500"
          >
            <option value="">Seleccione tipo de combustible</option>
            <option value="gasoline">Gasolina</option>
            <option value="diesel">Diesel</option>
            <option value="electric">Eléctrico</option>
            <option value="hybrid">Híbrido</option>
          </select>
        </div>

        {/* Tipo de transmisión */}
        <div className="mb-4">
          <label htmlFor="transmission" className="block text-lg font-medium mb-2">Transmisión:</label>
          <select
            id="transmission"
            name="transmission"
            value={formData.transmission}
            onChange={handleChange}
            className="w-full p-3 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-red-500"
          >
            <option value="">Seleccione tipo de transmisión</option>
            <option value="manual">Manual</option>
            <option value="automatic">Automática</option>
            <option value="cvt">CVT</option>  
            <option value="semi_automatic">Semi-automática</option>  
          </select>
        </div>

        {/* Tipo de tracción */}
        <div className="mb-4">
          <label htmlFor="traction" className="block text-lg font-medium mb-2">Tracción:</label>
          <select
            id="traction"
            name="traction"
            value={formData.traction}
            onChange={handleChange}
            className="w-full p-3 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-red-500"
          >
            <option value="">Seleccione tipo de tracción</option>
            <option value="delantera">Delantera</option>
            <option value="trasera">Trasera</option>
            <option value="total">Total (4x4)</option>
          </select>
        </div>

        {/* Puertas */}
        <div className="mb-4">
          <label htmlFor="doors" className="block text-lg font-medium mb-2">Puertas:</label>
          <select
            id="doors"
            name="doors"
            value={formData.doors}
            onChange={handleChange}
            className="w-full p-3 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-red-500"
          >
            <option value="">Seleccione número de puertas</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
        </div>

        {/* Sillones */}
        <div className="mb-4">
          <label htmlFor="seats" className="block text-lg font-medium mb-2">Sillones:</label>
          <select
            id="seats"
            name="seats"
            value={formData.seats}
            onChange={handleChange}
            className="w-full p-3 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-red-500"
          >
            <option value="">Seleccione número de sillones</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
          </select>
        </div>

        {/* Condición del coche */}
        <div className="mb-4">
          <label htmlFor="carCondition" className="block text-lg font-medium mb-2">Condición del coche:</label>
          <select
            id="carCondition"
            name="carCondition"
            value={formData.carCondition}
            onChange={handleChange}
            className="w-full p-3 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-red-500"
          >
            <option value="">Seleccione condición</option>
            <option value="nuevo">Nuevo</option>
            <option value="casi_nuevo">Casi nuevo</option>
            <option value="regular">Regular</option>
            <option value="estropeado">Estropeado</option>
            <option value="roto">Roto</option>
          </select>
        </div>

        {/* Descripción */}
        <div className="mb-4">
          <label htmlFor="description" className="block text-lg font-medium mb-2">Descripción:</label>
          <textarea
            id="description"
            name="description"
            value={formData.description}
            onChange={handleChange}
            className="w-full p-3 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-red-500"
            placeholder="Descripción del coche"
          />
        </div>

        {/* Imagen */}
        <div className="mb-4">
          <label htmlFor="image" className="block text-lg font-medium mb-2">Imagen del coche:</label>
          <input
            id="image"
            type="file"
            name="images"
            accept="image/*"
            multiple
            onChange={handleFileChange}
            className="w-full p-3 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-red-500"
          />
        </div>

        {/* Botón de envío */}
        <div className="flex justify-center">
          <button
            type="submit"
            className="w-full py-3 bg-red-500 text-white rounded-lg hover:bg-red-600 transition duration-300 focus:outline-none focus:ring-2 focus:ring-red-500"
          >
            Añadir coche
          </button>
        </div>
      </form>
      <ToastContainer />
    </div>
  );
}

export default SubmitCar;
