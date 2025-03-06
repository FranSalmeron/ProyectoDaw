import React, { useState, useEffect } from 'react';
import { toast, ToastContainer } from 'react-toastify';  
import 'react-toastify/dist/ReactToastify.css'; 


const symfonyUrl = import.meta.env.VITE_API_URL
const apiKeyLocation = import.meta.env.VITE_API_KEY

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
    doors: '',
    seats: '',
    description: '',
    location: '',
    publication_date: '',
    carCondition: '',
    carSold: false,
    user: '',
    image: null,  
  });

  useEffect(() => {
    // Obtener la latitud, longitud y localización automáticamente usando la API de geolocalización
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          // Obtener latitud y longitud
          const { latitude, longitude } = position.coords;
          setFormData((prevState) => ({
            ...prevState,
            latitude, 
            longitude, 
          }));

          // Obtener la localización (ciudad o dirección) usando la latitud y longitud
          fetch(`https://api.opencagedata.com/geocode/v1/json?q=${latitude}+${longitude}&key=${apiKeyLocation}`)
            .then((response) => response.json())
            .then((data) => {
              const location = data.results[0]?.formatted_address || 'Localización no disponible';
              setFormData((prevState) => ({
                ...prevState,
                location, // Guardar la localización
              }));
            })
            .catch((error) => console.error('Error al obtener la localización:', error));
        },
        (error) => {
          console.error("Error en geolocalización:", error);
        }
      );
    }

    //Establecer automáticamente la fecha de publicación como la fecha actual
    setFormData((prevState) => ({
      ...prevState,
      publication_date: new Date().toISOString().split('T')[0],  //Formato YYYY-MM-DD
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
    setFormData({
      ...formData,
      image: e.target.files[0],
    });
  };

  // Manejar el envío del formulario
  const handleSubmit = async (e) => {
    e.preventDefault();

    const data = new FormData();
    Object.keys(formData).forEach((key) => {
      data.append(key, formData[key]);
    });

    try {
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
    <div class="w-9/10 max-w-lg mx-auto bg-black text-white p-8 rounded-lg shadow-lg m-5">
      <h2 class="text-3xl font-bold text-center text-white-300 mb-6">Introduce los detalles del coche</h2>
      
      <form onSubmit={handleSubmit}>
        {/* Marca */}
        <div class="mb-4">
          <label htmlFor="brand" class="block text-lg font-medium mb-2">Marca:</label>
          <input
            id="brand"
            type="text"
            name="brand"
            value={formData.brand}
            onChange={handleChange}
            class="w-full p-3 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-red-500"
            placeholder="Marca del coche"
          />
        </div>

        {/* Modelo */}
        <div class="mb-4">
          <label htmlFor="model" class="block text-lg font-medium mb-2">Modelo:</label>
          <input
            id="model"
            type="text"
            name="model"
            value={formData.model}
            onChange={handleChange}
            class="w-full p-3 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-red-500"
            placeholder="Modelo del coche"
          />
        </div>

        {/* Año de fabricación */}
        <div class="mb-4">
          <label htmlFor="manufacture_year" class="block text-lg font-medium mb-2">Año de fabricación:</label>
          <input
            id="manufacture_year"
            type="number"
            name="manufacture_year"
            value={formData.manufacture_year}
            onChange={handleChange}
            class="w-full p-3 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-red-500"
            placeholder="Año de fabricación"
          />
        </div>

        {/* Kilometraje */}
        <div class="mb-4">
          <label htmlFor="mileage" class="block text-lg font-medium mb-2">Kilometraje:</label>
          <input
            id="mileage"
            type="number"
            name="mileage"
            value={formData.mileage}
            onChange={handleChange}
            class="w-full p-3 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-red-500"
            placeholder="Kilometraje"
          />
        </div>

        {/* Precio */}
        <div class="mb-4">
          <label htmlFor="price" class="block text-lg font-medium mb-2">Precio:</label>
          <input
            id="price"
            type="number"
            name="price"
            value={formData.price}
            onChange={handleChange}
            class="w-full p-3 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-red-500"
            placeholder="Precio del coche"
          />
        </div>

        {/* Color */}
        <div class="mb-4">
          <label htmlFor="color" class="block text-lg font-medium mb-2">Color:</label>
          <input
            id="color"
            type="text"
            name="color"
            value={formData.color}
            onChange={handleChange}
            class="w-full p-3 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-red-500"
            placeholder="Color del coche"
          />
        </div>

        {/* Tipo de combustible */}
        <div class="mb-4">
          <label htmlFor="fuelType" class="block text-lg font-medium mb-2">Tipo de combustible:</label>
          <select
            id="fuelType"
            name="fuelType"
            value={formData.fuelType}
            onChange={handleChange}
            class="w-full p-3 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-red-500"
          >
            <option value="">Seleccione tipo de combustible</option>
            <option value="gasoline">Gasolina</option>
            <option value="diesel">Diesel</option>
            <option value="electric">Eléctrico</option>
            <option value="hybrid">Híbrido</option>
          </select>
        </div>

        {/* Tipo de transmisión */}
        <div class="mb-4">
          <label htmlFor="transmission" class="block text-lg font-medium mb-2">Transmisión:</label>
          <select
            id="transmission"
            name="transmission"
            value={formData.transmission}
            onChange={handleChange}
            class="w-full p-3 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-red-500"
          >
            <option value="">Seleccione tipo de transmisión</option>
            <option value="manual">Manual</option>
            <option value="automatic">Automática</option>
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

        {/* Descripción */}
        <div class="mb-4">
          <label htmlFor="description" class="block text-lg font-medium mb-2">Descripción:</label>
          <textarea
            id="description"
            name="description"
            value={formData.description}
            onChange={handleChange}
            class="w-full p-3 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-red-500"
            placeholder="Descripción del coche"
          />
        </div>

        {/* Imagen */}
        <div class="mb-4">
          <label htmlFor="image" class="block text-lg font-medium mb-2">Imagen del coche:</label>
          <input
            id="image"
            type="file"
            name="image"
            onChange={handleFileChange}
            class="w-full p-3 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-red-500"
          />
        </div>

        {/* Botón de envío */}
        <div class="flex justify-center">
          <button
            type="submit"
            class="w-full py-3 bg-red-500 text-white rounded-lg hover:bg-red-600 transition duration-300 focus:outline-none focus:ring-2 focus:ring-red-500"
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
