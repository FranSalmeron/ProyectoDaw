import React, { useState, useEffect } from "react";
import { useDarkMode } from "../context/DarkModeContext";
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

  const { isDarkMode } = useDarkMode(); // Obtenemos modo oscuro

  // 🎨 Estilos condicionales por tema
  const bgMain = isDarkMode
    ? "bg-[#1C1C1E] text-white"
    : "bg-[#F5EFEB] text-black";
  const cardBg = isDarkMode ? "bg-[#2C2C2E]" : "bg-[#2F4156]";
  const inputBg = isDarkMode
    ? "bg-[#3A3A3C] text-white placeholder-gray-400"
    : "bg-gray-800 text-white";


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
    <div className={`${bgMain} min-h-screen p-5`}>
      <div
        className={`w-9/10 max-w-2xl mx-auto ${cardBg} p-8 rounded-lg shadow-lg m-5`}
      >
        <h2 className="text-3xl font-bold text-center mb-6">
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
              className={`w-full p-3 rounded-lg ${inputBg} focus:outline-none focus:ring-2 focus:ring-red-500`}
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
              className={`w-full p-3 rounded-lg ${inputBg} focus:outline-none focus:ring-2 focus:ring-red-500`}
              placeholder="Modelo del coche"
            />
          </div>

          {/* Precio */}
          <div className="mb-4">
            <label htmlFor="price" className="block text-lg font-medium mb-2">
              Precio:
            </label>
            <input
              id="price"
              type="number"
              name="price"
              required
              value={formData.price}
              onChange={handlePriceOrMileageChange}
              className={`w-full p-3 rounded-lg ${inputBg} focus:outline-none focus:ring-2 focus:ring-red-500`}
              placeholder="Precio del vehículo"
            />
          </div>

          {/* Kilometraje */}
          <div className="mb-4">
            <label htmlFor="mileage" className="block text-lg font-medium mb-2">
              Kilometraje:
            </label>
            <input
              id="mileage"
              type="number"
              name="mileage"
              required
              value={formData.mileage}
              onChange={handlePriceOrMileageChange}
              className={`w-full p-3 rounded-lg ${inputBg} focus:outline-none focus:ring-2 focus:ring-red-500`}
              placeholder="Kilometraje del vehículo"
            />
          </div>

          {/* Año */}
          <div className="mb-4">
            <label htmlFor="year" className="block text-lg font-medium mb-2">
              Año:
            </label>
            <input
              id="year"
              type="number"
              name="year"
              required
              value={formData.year}
              onChange={handleChange}
              className={`w-full p-3 rounded-lg ${inputBg} focus:outline-none focus:ring-2 focus:ring-red-500`}
              placeholder="Año del vehículo"
            />
          </div>

          {/* Mapa */}
          <div className="mb-4 h-[300px]">
            <label className="block text-lg font-medium mb-2">Ubicación:</label>
            <MapContainer
              center={[40.416775, -3.70379]}
              zoom={13}
              className="h-full w-full rounded-lg"
            >
              <TileLayer
                url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
                attribution='&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
              />
              <MapClickHandler />
            </MapContainer>
          </div>

          {/* Imágenes */}
          <div className="mb-4">
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
              className={`w-full p-3 rounded-lg ${inputBg} focus:outline-none focus:ring-2 focus:ring-red-500`}
              disabled={formData.images.length >= 3}
            />
            <p className={`text-sm mt-2 ${textMuted}`}>
              Imágenes seleccionadas: {formData.images.length} / 3
            </p>
            {formData.images.length > 0 && (
              <div className="mt-2 flex flex-wrap gap-2">
                {formData.images.map((image, index) => (
                  <div key={index} className="relative">
                    <img
                      src={URL.createObjectURL(image)}
                      alt={`Preview ${index + 1}`}
                      className="w-20 h-20 object-cover rounded"
                    />
                    <button
                      type="button"
                      onClick={() => handleRemoveImage(index)}
                      className="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center"
                    >
                      ×
                    </button>
                  </div>
                ))}
              </div>
            )}
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
