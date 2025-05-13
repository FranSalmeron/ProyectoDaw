import React, { useState, useEffect } from "react";
import { toast } from "react-toastify";
import "react-toastify/dist/ReactToastify.css";
import {
  MapContainer,
  TileLayer,
  Marker,
  Popup,
  useMapEvents,
} from "react-leaflet";
import L from "leaflet";
import "leaflet/dist/leaflet.css";
import { useNavigate } from "react-router-dom";
import { getUserIdFromToken } from "../helpers/decodeToken";
import Select from "react-select";
import { useCars } from "../context/CarContext";

const symfonyUrl = import.meta.env.VITE_API_URL;

function SubmitCar() {
  const navigate = useNavigate();
  const [formData, setFormData] = useState({
    brand: "",
    model: "",
    manufacture_year: "",
    mileage: "",
    price: "",
    color: "",
    fuelType: "",
    transmission: "",
    traction: "",
    doors: "",
    seats: "",
    description: "",
    publication_date: "",
    carCondition: "",
    carSold: false,
    user: null,
    images: [],
    lat: null,
    lon: null,
    city: "",
  });
  const { clearCars } = useCars();
  // Establecer automáticamente la fecha de publicación como la fecha actual
  useEffect(() => {
    if (formData.user == null) {
      const userId = getUserIdFromToken(); // Suponiendo que esta función obtiene el ID del usuario desde el token
      setFormData((prevState) => ({
        ...prevState,
        user: userId, // Asignamos el userId al estado correctamente
      }));
    }

    setFormData((prevState) => ({
      ...prevState,
      publication_date: new Date().toISOString().split("T")[0], // Formato YYYY-MM-DD
    }));

    // Obtener la ubicación del usuario automáticamente si es posible
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          const { latitude, longitude } = position.coords;
          setFormData((prevState) => ({
            ...prevState,
            lat: latitude,
            lon: longitude,
          }));
        },
        (error) => {
          console.error(error);
          toast.error("No se pudo obtener la ubicación automáticamente");
        }
      );
    }
  }, []);

  useEffect(() => {
    if (formData.lat && formData.lon) {
      fetchCity(formData.lat, formData.lon);
    }
  }, [formData.lat, formData.lon]);

  // Función para obtener la ciudad usando las coordenadas
  const fetchCity = async (lat, lon) => {
    try {
      // Convertir lat y lon a formato correcto
      const latFormatted = lat.toString().replace(",", ".");
      const lonFormatted = lon.toString().replace(",", ".");

      // Realizar la solicitud a la API
      const response = await fetch(
        `https://nominatim.openstreetmap.org/reverse?lat=${latFormatted}&lon=${lonFormatted}&format=json&addressdetails=1`
      );

      if (!response.ok) {
        toast.error("No se pudo obtener la ciudad");
        return false;
      }

      const data = await response.json();

      if (data.address) {
        let city = "";

        // Si hay un pueblo (town), se toma primero el valor de town
        if (data.address.town) {
          city += data.address.town;
        }

        // Si hay una ciudad (city), se añade después del pueblo (si existe)
        if (data.address.city) {
          city += (city ? " " : "") + data.address.city;
        }

        // Si hay una provincia (province), se añade después de la ciudad (si existe)
        if (data.address.province) {
          city += (city ? " " : "") + data.address.province;
        }

        if (city) {
          setFormData((prevState) => ({
            ...prevState,
            city: city.trim(), // Guardamos la ciudad en el estado
          }));
        } else {
          toast.error("No se pudo obtener la ciudad");
        }
      } else {
        toast.error("No se pudo obtener la ciudad");
      }
    } catch (error) {
      console.error("Error obteniendo la ciudad:", error);
      toast.error("Error al obtener la ciudad");
    }
  };

  // Componente para el mapa que permite seleccionar ubicación
  const MapClickHandler = () => {
    const map = useMapEvents({
      click(event) {
        const { lat, lng } = event.latlng;
        setFormData((prevState) => ({
          ...prevState,
          lat,
          lon: lng,
        }));
      },
    });

    return (
      formData.lat &&
      formData.lon && (
        <Marker position={[formData.lat, formData.lon]} icon={carIcon}>
          <Popup>Ubicación seleccionada.</Popup>
        </Marker>
      )
    );
  };

  // Manejar cambios en los inputs del formulario
  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData({
      ...formData,
      [name]: value,
    });
  };

  const handleSliderChange = (e) => {
    const { name, value } = e.target;
    setFormData({
      ...formData,
      [name]: parseInt(value), // Para convertir a número entero
    });
  };

  const handlePriceOrMileageChange = (e) => {
    const { name, value } = e.target;
    if (value >= 0) {
      setFormData({
        ...formData,
        [name]: value,
      });
    }
  };

  const carIcon = new L.Icon({
    iconUrl: "/images/marcador.png", // Ruta de la imagen del marcador personalizado
    iconSize: [32, 32], // Tamaño del marcador
    iconAnchor: [16, 32], // Punto del icono donde se va a anclar el marcador
    popupAnchor: [0, -32], // Anclaje del popup
  });

  // Manejar la carga del archivo de imagen
  const handleFileChange = (e) => {
    const newFiles = Array.from(e.target.files);
    const totalImages = formData.images.length + newFiles.length;

    if (totalImages > 3) {
      toast.error("Solo puedes subir un máximo de 3 imágenes.");
      return;
    }

    setFormData((prevState) => ({
      ...prevState,
      images: [...prevState.images, ...newFiles],
    }));
  };

  const handleRemoveImage = (index) => {
    const updatedImages = [...formData.images];
    updatedImages.splice(index, 1);

    setFormData((prevState) => ({
      ...prevState,
      images: updatedImages,
    }));
  };

  // Manejar el envío del formulario
  const handleSubmit = async (e) => {
    e.preventDefault();
    e.stopPropagation();

    if (!formData.brand) {
      toast.error("Por favor, selecciona una marca");
      return;
    }
    // Obtener la ciudad a partir de las coordenadas
    await fetchCity(formData.lat, formData.lon);

    if (!formData.city) {
      toast.error("La ciudad no está disponible, no se puede enviar el coche.");
      return;
    }

    // Crear FormData y añadir los datos del formulario
    const data = new FormData();
    Object.keys(formData).forEach((key) => {
      if (key === "images" && formData.images) {
        formData.images.forEach((file) => {
          data.append("images[]", file); // Usamos 'images[]' para enviar múltiples imágenes
        });
      } else {
        data.append(key, formData[key]);
      }
    });
    try {
      console.log(formData);
      const response = await fetch(`${symfonyUrl}/car/new`, {
        method: "POST",
        body: data,
      });

      if (response.ok) {
        toast.success("Coche creado con éxito");
        localStorage.removeItem("cachedCars");
        clearCars(); // Limpiar el estado de coches
      } else {
        toast.error("Error al crear el coche");
        toast.info(
          "Tamaño de imagen demasiado grande, pon imagenes menos pesadas. Recargando la página en 4 segundos..."
        );
        setTimeout(() => {
          window.location.reload(); // Recargar la página después de 4 xsegundos
        }, 4000);
      }
    } catch (error) {
      console.error("Hubo un error:", error);
      toast.info(
        "Tamaño de imagen demasiado grande. Pon menos imágenes. Recargando la página en 4 segundos..."
      );
      setTimeout(() => {
        window.location.reload(); // Recargar la página después de 4 segundos
      }, 4000);
    }
  };

  const brands = [
    { label: "Acura", value: "acura" },
    { label: "Alfa Romeo", value: "alfa_romeo" },
    { label: "Aston Martin", value: "aston_martin" },
    { label: "Audi", value: "audi" },
    { label: "Bentley", value: "bentley" },
    { label: "BMW", value: "bmw" },
    { label: "Bugatti", value: "bugatti" },
    { label: "Buick", value: "buick" },
    { label: "Chevrolet", value: "chevrolet" },
    { label: "Chrysler", value: "chrysler" },
    { label: "Citroën", value: "citroen" },
    { label: "Dodge", value: "dodge" },
    { label: "Fiat", value: "fiat" },
    { label: "Ford", value: "ford" },
    { label: "Ferrari", value: "ferrari" },
    { label: "Genesis", value: "genesis" },
    { label: "GMC", value: "gmc" },
    { label: "Honda", value: "honda" },
    { label: "Hyundai", value: "hyundai" },
    { label: "Infiniti", value: "infiniti" },
    { label: "Jaguar", value: "jaguar" },
    { label: "Jeep", value: "jeep" },
    { label: "Kia", value: "kia" },
    { label: "Land Rover", value: "land_rover" },
    { label: "Lamborghini", value: "lamborghini" },
    { label: "Lincoln", value: "lincoln" },
    { label: "Lexus", value: "lexus" },
    { label: "Mazda", value: "mazda" },
    { label: "McLaren", value: "mclaren" },
    { label: "Mercedes-Benz", value: "mercedes" },
    { label: "Mini", value: "mini" },
    { label: "Mitsubishi", value: "mitsubishi" },
    { label: "Maserati", value: "maserati" },
    { label: "Nissan", value: "nissan" },
    { label: "Opel", value: "opel" },
    { label: "Peugeot", value: "peugeot" },
    { label: "Porsche", value: "porsche" },
    { label: "Ram", value: "ram" },
    { label: "Renault", value: "renault" },
    { label: "Rolls-Royce", value: "rolls_royce" },
    { label: "Seat", value: "seat" },
    { label: "Skoda", value: "skoda" },
    { label: "Smart", value: "smart" },
    { label: "Subaru", value: "subaru" },
    { label: "Suzuki", value: "suzuki" },
    { label: "Tesla", value: "tesla" },
    { label: "Toyota", value: "toyota" },
    { label: "Volkswagen", value: "volkswagen" },
    { label: "Volvo", value: "volvo" },
  ];

  const handleBrandChange = (selectedOption) => {
    setFormData({
      ...formData,
      brand: selectedOption ? selectedOption.value : "",
    });
  };

  return (
    <div class="bg-[#F5EFEB] min-h-screen p-5">
      <div className="w-9/10 max-w-2xl mx-auto bg-[#2F4156] text-white p-8 rounded-lg shadow-lg m-5">
        <h2 className="text-3xl font-bold text-center text-white-300 mb-6">
          Introduce los detalles del coche
        </h2>

        <form onSubmit={handleSubmit}>
          {/* Marca */}
          <div className="mb-4">
            <label htmlFor="brand" className="block text-lg font-medium mb-2">
              Marca:
            </label>
            <select
              id="brand"
              name="brand"
              value={formData.brand}
              onChange={(e) => handleBrandChange(e.target)}
              className="w-full p-3 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-red-500"
            >
              <option value="">Selecciona la marca</option>
              {brands.map((brand) => (
                <option key={brand.value} value={brand.value}>
                  {brand.label}
                </option>
              ))}
            </select>
          </div>

          {/* Modelo */}
          <div className="mb-4">
            <label htmlFor="model" className="block text-lg font-medium mb-2">
              Modelo:
            </label>
            <input
              id="model"
              type="text"
              name="model"
              required
              value={formData.model}
              onChange={handleChange}
              className="w-full p-3 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-red-500"
              placeholder="Modelo del coche"
            />
          </div>

          {/* Año de fabricación */}
          <div className="mb-4">
            <label
              htmlFor="manufacture_year"
              className="block text-lg font-medium mb-2"
            >
              Año de fabricación:
            </label>
            <input
              id="manufacture_year"
              type="number"
              name="manufacture_year"
              min="1900"
              max={new Date().getFullYear()}
              required
              value={formData.manufacture_year}
              onChange={handleChange}
              className="w-full p-3 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-red-500"
              placeholder="Año de fabricación"
            />
          </div>

          {/* Kilometraje */}
          <div className="mb-4">
            <label htmlFor="mileage" className="block text-lg font-medium mb-2">
              Kilometraje (en km):
            </label>
            <div className="flex items-center">
              <input
                id="mileage"
                type="range"
                name="mileage"
                min="0"
                max="500000"
                step="10000"
                required
                value={formData.mileage}
                onChange={handleSliderChange}
                className="w-3/4 p-2 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-red-500"
              />
              <input
                type="number"
                name="mileage"
                value={formData.mileage}
                onChange={handlePriceOrMileageChange}
                className="ml-4 w-28 p-3 bg-gray-800 text-white rounded-lg"
                min="0"
                required
              />
            </div>
            <p className="text-center">{formData.mileage} km</p>
          </div>

          {/* Precio */}
          <div className="mb-4">
            <label htmlFor="price" className="block text-lg font-medium mb-2">
              Precio:
            </label>
            <div className="flex items-center">
              <input
                id="price"
                type="range"
                name="price"
                min="0"
                max="100000"
                step="1000"
                required
                value={formData.price}
                onChange={handleSliderChange}
                className="w-3/4 p-2 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-red-500"
              />
              <input
                type="number"
                name="price"
                value={formData.price}
                onChange={handlePriceOrMileageChange}
                className="ml-4 w-28 p-3 bg-gray-800 text-white rounded-lg"
                min="0"
                step="0.01"
                required
              />
            </div>
            <p className="text-center">{formData.price}€</p>
          </div>

          {/* Color (Paleta de colores) */}
          <div className="mb-4">
            <label htmlFor="color" className="block text-lg font-medium mb-2">
              Color:
            </label>
            <input
              type="text"
              name="color"
              value={formData.color}
              onChange={handleChange}
              className="w-full p-3 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-red-500"
              placeholder="Escribe el color del coche"
            />
          </div>

          {/* Tipo de combustible */}
          <div className="mb-4">
            <label
              htmlFor="fuelType"
              className="block text-lg font-medium mb-2"
            >
              Tipo de combustible:
            </label>
            <select
              id="fuelType"
              name="fuelType"
              value={formData.fuelType}
              required
              onChange={handleChange}
              className="w-full p-3 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-red-500"
            >
              <option value="">Seleccione tipo de combustible</option>
              <option value="gasolina">Gasolina</option>
              <option value="diesel">Diesel</option>
              <option value="electrico">Eléctrico</option>
              <option value="hibrido">Híbrido</option>
            </select>
          </div>

          {/* Tipo de transmisión */}
          <div className="mb-4">
            <label
              htmlFor="transmission"
              className="block text-lg font-medium mb-2"
            >
              Transmisión:
            </label>
            <select
              id="transmission"
              name="transmission"
              required
              value={formData.transmission}
              onChange={handleChange}
              className="w-full p-3 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-red-500"
            >
              <option value="">Seleccione tipo de transmisión</option>
              <option value="manual">Manual</option>
              <option value="automatico">Automática</option>
              <option value="cvt">CVT</option>
              <option value="semi_automatico">Semi-automática</option>
            </select>
          </div>

          {/* Tipo de tracción */}
          <div className="mb-4">
            <label
              htmlFor="traction"
              className="block text-lg font-medium mb-2"
            >
              Tracción:
            </label>
            <select
              id="traction"
              name="traction"
              value={formData.traction}
              required
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
            <label htmlFor="doors" className="block text-lg font-medium mb-2">
              Puertas:
            </label>
            <input
              id="doors"
              type="range"
              name="doors"
              min="1"
              max="5"
              value={formData.doors}
              onChange={handleSliderChange}
              className="w-full p-3 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-red-500"
            />
            <p className="text-center">{formData.doors} Puertas</p>
          </div>

          {/* Sillones */}
          <div className="mb-4">
            <label htmlFor="seats" className="block text-lg font-medium mb-2">
              Sillones:
            </label>
            <input
              id="seats"
              type="range"
              name="seats"
              min="1"
              max="9"
              value={formData.seats}
              onChange={handleSliderChange}
              className="w-full p-3 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-red-500"
            />
            <p className="text-center">{formData.seats} Sillones</p>
          </div>

          {/* Condición del coche */}
          <div className="mb-4">
            <label
              htmlFor="carCondition"
              className="block text-lg font-medium mb-2"
            >
              Condición del coche:
            </label>
            <select
              id="carCondition"
              name="carCondition"
              value={formData.carCondition}
              required
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
            <label
              htmlFor="description"
              className="block text-lg font-medium mb-2"
            >
              Descripción:
            </label>
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
          <div className="mb-2">
            <p className="text-sm text-red-400 mb-2">
              Puedes subir hasta 3 imágenes como máximo.
            </p>
            <input
              id="image"
              type="file"
              name="images"
              accept="image/*"
              multiple
              onChange={handleFileChange}
              className="w-full p-3 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-red-500"
              disabled={formData.images.length >= 3}
            />
            <p className="text-sm text-gray-300 mt-2">
              Imágenes seleccionadas: {formData.images.length} / 3
            </p>
          </div>

          {/* Vista previa de imágenes */}
          <div className="flex flex-wrap gap-4 mt-3">
            {formData.images.map((img, index) => (
              <div key={index} className="relative w-24 h-24">
                <img
                  src={URL.createObjectURL(img)}
                  alt={`Preview ${index}`}
                  className="w-full h-full object-cover rounded-lg"
                />
                <button
                  type="button"
                  onClick={() => handleRemoveImage(index)}
                  className="absolute top-0 right-0 bg-red-600 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm hover:bg-red-700"
                >
                  ×
                </button>
              </div>
            ))}
          </div>

          {/* Latitud y Longitud (autocompletado o manual) */}
          <div className="mb-4">
            <label htmlFor="lat" className="block text-lg font-medium mb-2">
              Latitud:
            </label>
            <input
              id="lat"
              type="number"
              name="lat"
              value={formData.lat || ""}
              onChange={handleChange}
              className="w-full p-3 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-red-500"
              placeholder="Latitud"
            />
          </div>

          <div className="mb-4">
            <label htmlFor="lon" className="block text-lg font-medium mb-2">
              Longitud:
            </label>
            <input
              id="lon"
              type="number"
              name="lon"
              value={formData.lon || ""}
              onChange={handleChange}
              className="w-full p-3 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-red-500"
              placeholder="Longitud"
            />
          </div>

          {/* Mapa para seleccionar ubicación */}
          <div className="mb-4" style={{ height: "300px" }}>
            <MapContainer
              center={[formData.lat || 37.1775, formData.lon || -3.5986]}
              zoom={13}
              scrollWheelZoom={false}
              style={{ height: "100%", width: "100%" }}
            >
              <TileLayer url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png" />

              <MapClickHandler />
            </MapContainer>
          </div>

          {/* Botón de envío */}
          <div className="flex justify-center">
            <button
              type="submit"
              className="w-full py-3 bg-[#43697a] text-white rounded-lg hover:bg-[#567C8D] transition duration-300 focus:outline-none focus:ring-2 focus:ring-red-500"
            >
              Añadir coche
            </button>
          </div>
        </form>
      </div>
    </div>
  );
}

export default SubmitCar;
