import React, { useState, useEffect } from "react";
import { useCars } from "../context/CarContext";
import { carList } from "../helpers/carHelper";
import { toast } from "react-toastify";
import CarCards from "../components/CarCards";
import { useFavorites } from "../context/FavoriteContext";
import { getFavorites } from "../helpers/favoriteHelper";
import { getUserIdFromToken } from "../helpers/decodeToken";
import { useDarkMode } from "../context/DarkModeContext";

const Home = () => {
  const { cars, addCars, clearCars } = useCars();
  const { addFavorites, removeFromData } = useFavorites();
  const [filters, setFilters] = useState({
    city: "",
    category: "",
    brand: "",
    traction: "",
    fuelType: "",
    seats: [1, 9],
    price: { min: 0, max: 99999999 },
    mileage: { min: 0, max: 99999999 },
    decade: "",
    model: "",
  });
  const [filteredCars, setFilteredCars] = useState([]);
  const [showFilters, setShowFilters] = useState(false);
  const [loading, setLoading] = useState(true);
  const [currentPage, setCurrentPage] = useState(1); // Página actual
  const [totalPages, setTotalPages] = useState(1); // Total de páginas
  const [limit, setLimit] = useState(10); // Limite de coches por página
  const startIdx = (currentPage - 1) * limit;
  const endIdx = startIdx + limit;
  const paginatedCars = filteredCars.slice(startIdx, endIdx);

  const userId = getUserIdFromToken() ? getUserIdFromToken() : null;

  // Modo oscuro — VARIABLES PARA CLASES (nuevo)
  const { isDarkMode } = useDarkMode();
  const bgMain = isDarkMode
    ? "bg-[#1C1C1E] text-white"
    : "bg-[#F5EFEB] text-black"; // fondo principal y texto
  const borderFilters = isDarkMode
    ? "border-gray-600 text-white placeholder-gray-400 bg-[#2C2C2E]" // Fondo oscuro y texto blanco
    : "border-gray-300 text-black placeholder-gray-700  bg-white"; // Fondo blanco y texto negro
  // bordes y texto inputs/select
  const btnClear = isDarkMode
    ? "bg-red-600 hover:bg-red-700"
    : "bg-red-500 hover:bg-red-600"; // botón limpiar filtros
  const bgFilters = isDarkMode ? "bg-[#2C2C2E]" : "bg-gray-100"; // Fondo del panel de filtros

  useEffect(() => {
    const getAllCars = async () => {
      setLoading(true);
      try {
        await getFavorites(userId, addFavorites);

        // Verificar si ya tenemos coches en el estado global (con caché válido)
        const cacheDuration = 1 * 60 * 1000; // 1 minuto
        const now = new Date();
        if (
          cars.length &&
          now - new Date(cars[0]?.lastUpdated) < cacheDuration
        ) {
          const filtered = applyFilters(cars); // Filtrar coches si ya están en el estado
          setFilteredCars(filtered);
          setTotalPages(Math.ceil(filtered.length / limit));
          setCurrentPage(1);
          setLoading(false);
          return; // Si el caché es válido, salir
        }

        // Si no tenemos caché válido, revisamos el localStorage
        const stored = localStorage.getItem("cachedCars");
        if (stored) {
          const parsed = JSON.parse(stored);
          const isValid = now - new Date(parsed.lastUpdated) < cacheDuration;

          if (isValid && parsed.cars?.length) {
            // Si el caché del localStorage es válido, lo usamos
            parsed.cars.forEach((car) => addCars(car)); // Añadir coches desde localStorage

            // Filtrar los coches desde el caché
            const filteredFromCache = applyFilters(parsed.cars);
            setFilteredCars(filteredFromCache);
            setTotalPages(Math.ceil(filteredFromCache.length / limit));
            setCurrentPage(1);
            setLoading(false);
            return; // Si usamos el caché, salir
          }
        }

        // Si no tenemos coches en el estado o en el caché, cargamos desde la API
        const firstPage = await carList(1, limit); // Cargar la primera página de coches
        const pagesToFetch = firstPage.totalPages; // Total de páginas disponibles
        const pagePromises = [];

        // Crear promesas para cargar todas las páginas
        for (let i = 2; i <= pagesToFetch; i++) {
          pagePromises.push(carList(i, limit));
        }

        // Esperar todas las promesas de las páginas adicionales
        const results = await Promise.all(pagePromises);
        let allCars = [
          firstPage.cars,
          ...results.map((res) => res.cars),
        ].flat();
        allCars = allCars.map((car) => ({
          ...car,
          lastUpdated: new Date().toISOString(),
        }));

        // Limpiar el estado global y agregar los coches
        allCars.forEach((car) => addCars(car));

        // Guardar los coches en localStorage
        localStorage.setItem(
          "cachedCars",
          JSON.stringify({
            cars: allCars,
            totalPages: pagesToFetch,
            currentPage: 1,
            lastUpdated: new Date().toISOString(),
          })
        );

        // Filtrar los coches obtenidos de la API
        const filtered = applyFilters(allCars);
        setFilteredCars(filtered);
        setTotalPages(Math.ceil(filtered.length / limit));
        setCurrentPage(1);
      } catch (err) {
        toast.error("No se pudieron cargar los coches o los favoritos.");
        console.error("Error al cargar coches o favoritos:", err);
      } finally {
        setLoading(false);
      }
    };

    getAllCars(); // Llamada para cargar los coches
  }, []); // Solo se ejecuta cuando el componente se monta

  useEffect(() => {
    const filtered = applyFilters(cars); // Aplica filtros a TODOS los coches
    setFilteredCars(filtered); // Guarda los coches filtrados
    setCurrentPage(1); // Resetea la paginación
    setTotalPages(Math.ceil(filtered.length / limit));
  }, [filters, cars]);

  // Función que aplica los filtros a la lista de coches
  const applyFilters = (cars) => {
    return cars.filter((car) => {
      const cityMatch = filters.city
        ? car.city.toLowerCase().includes(filters.city.toLowerCase())
        : true;
      const priceMatch =
        car.price >= Number(filters.price.min) &&
        car.price <= Number(filters.price.max);
      const mileageMatch =
        car.mileage >= Number(filters.mileage.min) &&
        car.mileage <= Number(filters.mileage.max);
      const seatsMatch =
        car.seats >= filters.seats[0] && car.seats <= filters.seats[1];
      const categoryMatch = filters.category
        ? car.category.toLowerCase().includes(filters.category.toLowerCase())
        : true;
      const brandMatch = filters.brand
        ? car.brand.toLowerCase().includes(filters.brand.toLowerCase())
        : true;
      const tractionMatch = filters.traction
        ? car.traction.toLowerCase().includes(filters.traction.toLowerCase())
        : true;
      const fuelTypeMatch = filters.fuelType
        ? car.fuelType.toLowerCase().includes(filters.fuelType.toLowerCase())
        : true;
      const modelMatch = filters.model
        ? car.model.toLowerCase().includes(filters.model.toLowerCase())
        : true;
      const decadeMatch = filters.decade
        ? car.manufacture_year >= filters.decade[0] &&
          car.manufacture_year < filters.decade[1]
        : true;

      return (
        cityMatch &&
        priceMatch &&
        mileageMatch &&
        seatsMatch &&
        categoryMatch &&
        brandMatch &&
        tractionMatch &&
        fuelTypeMatch &&
        modelMatch &&
        decadeMatch
      );
    });
  };

  useEffect(() => {
    const pages = Math.ceil(filteredCars.length / limit);
    setTotalPages(pages);

    // Si el filtro deja menos páginas que la actual, volvemos a la 1
    if (currentPage > pages) {
      setCurrentPage(1);
    }
  }, [filteredCars, limit]);

  // Función para cambiar de página
  const handlePageChange = (newPage) => {
    if (newPage > 0 && newPage <= totalPages) {
      setCurrentPage(newPage);
      // Asegurarse de que el scroll ocurra después de la actualización del estado
      setTimeout(() => {
        window.scrollTo({ top: 0, behavior: "smooth" });
      }, 100); // Retraso opcional de 100ms para asegurar el comportamiento
    }
  };

  const handleSliderChange = (e, field) => {
    const value = Number(e.target.value);
    setFilters((prevFilters) => {
      let updatedFilters = { ...prevFilters };
      if (field === "seats") {
        updatedFilters.seats[0] = value;
      }
      return updatedFilters;
    });
  };

  const handleClearFilters = () => {
    setFilters({
      city: "",
      category: "",
      brand: "",
      traction: "",
      fuelType: "",
      seats: [1, 9],
      price: { min: 0, max: 1000000 },
      mileage: { min: 0, max: 500000 },
      model: "",
      decade: "",
    });
  };

  const handleFilterChange = (e) => {
    setFilters({
      ...filters,
      [e.target.name]: e.target.value,
    });
  };

  const cities = [
    "Álava",
    "Ávila",
    "Alicante",
    "Algeciras",
    "Alcalá de Henares",
    "Almería",
    "Badalona",
    "Badajoz",
    "Barcelona",
    "Bilbao",
    "Burgos",
    "Cádiz",
    "Cáceres",
    "Castellón de la Plana",
    "Córdoba",
    "Cuenca",
    "Elche",
    "Gerona",
    "Granada",
    "Gijón",
    "Huelva",
    "Huesca",
    "La Coruña",
    "La Rasa",
    "La Rioja",
    "L'Hospitalet de Llobregat",
    "Lleida",
    "Logroño",
    "Málaga",
    "Marbella",
    "Mataró",
    "Melilla",
    "Murcia",
    "Madrid",
    "Oviedo",
    "Ourense",
    "Pamplona",
    "Pontevedra",
    "Reus",
    "Salamanca",
    "San Cristóbal de La Laguna",
    "San Sebastián",
    "Santa Cruz de Tenerife",
    "Segovia",
    "Soria",
    "Santander",
    "Sevilla",
    "Toledo",
    "Terrassa",
    "Valencia",
    "Valladolid",
    "Vigo",
    "Zaragoza",
  ];
  const carBrands = [
    "Acura",
    "Alfa Romeo",
    "Aston Martin",
    "Audi",
    "Bentley",
    "BMW",
    "Bugatti",
    "Buick",
    "Chevrolet",
    "Chrysler",
    "Citroën",
    "Dodge",
    "Fiat",
    "Ford",
    "Ferrari",
    "Genesis",
    "GMC",
    "Honda",
    "Hyundai",
    "Infiniti",
    "Jaguar",
    "Jeep",
    "Kia",
    "Land Rover",
    "Lamborghini",
    "Lincoln",
    "Lexus",
    "Mazda",
    "McLaren",
    "Mercedes-Benz",
    "Mini",
    "Mitsubishi",
    "Maserati",
    "Nissan",
    "Opel",
    "Peugeot",
    "Porsche",
    "Ram",
    "Renault",
    "Rolls-Royce",
    "Seat",
    "Skoda",
    "Smart",
    "Subaru",
    "Suzuki",
    "Tesla",
    "Toyota",
    "Volkswagen",
    "Volvo",
  ];

  return (
    <div
      className={`${bgMain} flex flex-col sm:flex-row p-4 transition-colors duration-300`}
    >
      <button
        className="sm:hidden bg-blue-500 text-white p-2 rounded-lg mb-4"
        onClick={() => setShowFilters(!showFilters)}
      >
        {showFilters ? "Ocultar Filtros" : "Mostrar Filtros"}
      </button>

      <div
        className={`w-full sm:h-1/4 sm:w-1/4 ${bgFilters} p-4 rounded-lg shadow-lg mb-4 sm:mb-0 transition-all duration-300 ease-in-out ${
          showFilters ? "block" : "hidden sm:block"
        }`}
      >
        <h3 className="text-xl font-semibold mb-4">Filtros de Búsqueda</h3>

        <label className="block mb-2">Buscar por modelo</label>
        <input
          type="text"
          name="model"
          value={filters.model}
          onChange={handleFilterChange}
          className={`p-2 border rounded w-full mb-4 ${borderFilters}`}
          placeholder="Ej: corolla"
        />

        <label
          className={`block mb-2 ${isDarkMode ? "text-white" : "text-black"}`}
        >
          Marca
        </label>
        <select
          name="brand"
          value={filters.brand}
          onChange={handleFilterChange}
          className={`p-2 border rounded w-full mb-4 ${borderFilters}`}
        >
          <option value="">Seleccionar marca</option>
          {carBrands.map((brand, index) => (
            <option
              key={index}
              value={brand.toLowerCase().replace(/\s+/g, "_")}
            >
              {brand}
            </option>
          ))}
        </select>

        <label
          className={`block mb-2 ${isDarkMode ? "text-white" : "text-black"}`}
        >
          Seleccionar ciudad
        </label>
        <select
          name="city"
          value={filters.city}
          onChange={handleFilterChange}
          className={`p-2 border rounded w-full mb-4 ${borderFilters}`}
        >
          <option value="">Seleccionar ciudad</option>
          {cities.map((city, index) => (
            <option key={index} value={city}>
              {city}
            </option>
          ))}
        </select>

        <label className="block mb-2">Rango de Precio</label>
        <div className="flex mb-4">
          <input
            type="number"
            name="priceMin"
            value={filters.price.min}
            onChange={(e) =>
              setFilters({
                ...filters,
                price: { ...filters.price, min: e.target.value },
              })
            }
            className={`p-2 border rounded w-1/2 mr-2 ${borderFilters}`}
            placeholder="Mínimo"
          />
          <input
            type="number"
            name="priceMax"
            value={filters.price.max}
            onChange={(e) =>
              setFilters({
                ...filters,
                price: { ...filters.price, max: e.target.value },
              })
            }
            className={`p-2 border rounded w-1/2 ${borderFilters}`}
            placeholder="Máximo"
          />
        </div>

        <label className="block mb-2">Rango de Kilometraje</label>
        <div className="flex mb-4">
          <input
            type="number"
            name="mileageMin"
            value={filters.mileage.min}
            onChange={(e) =>
              setFilters({
                ...filters,
                mileage: { ...filters.mileage, min: e.target.value },
              })
            }
            className={`p-2 border rounded w-1/2 mr-2 ${borderFilters}`}
            placeholder="Mínimo"
          />
          <input
            type="number"
            name="mileageMax"
            value={filters.mileage.max}
            onChange={(e) =>
              setFilters({
                ...filters,
                mileage: { ...filters.mileage, max: e.target.value },
              })
            }
            className={`p-2 border rounded w-1/2 ${borderFilters}`}
            placeholder="Máximo"
          />
        </div>

        <label
          className={`block mb-2 ${isDarkMode ? "text-white" : "text-black"}`}
        >
          Tracción
        </label>
        <select
          name="traction"
          value={filters.traction}
          onChange={handleFilterChange}
          className={`p-2 border rounded w-full mb-4 ${borderFilters}`}
        >
          <option value="">Seleccionar tracción</option>
          <option value="delantera">Delantera</option>
          <option value="trasera">Trasera</option>
          <option value="total">Total</option>
        </select>

        <label
          className={`block mb-2 ${isDarkMode ? "text-white" : "text-black"}`}
        >
          Combustible
        </label>
        <select
          name="fuelType"
          value={filters.fuelType}
          onChange={handleFilterChange}
          className={`p-2 border rounded w-full mb-4 ${borderFilters}`}
        >
          <option value="">Seleccionar combustible</option>
          <option value="gasolina">Gasolina</option>
          <option value="diesel">Diesel</option>
          <option value="electric">Eléctrico</option>
        </select>

        <label
          className={`block mb-2 ${isDarkMode ? "text-white" : "text-black"}`}
        >
          Filtrar por década
        </label>
        <select
          name="decade"
          value={filters.decade}
          onChange={(e) => {
            const selectedDecade = e.target.value
              ? JSON.parse(e.target.value)
              : "";
            setFilters({
              ...filters,
              decade: selectedDecade,
            });
          }}
          className={`p-2 border rounded w-full mb-4 ${borderFilters}`}
        >
          <option value="">Seleccionar década</option>
          <option value="[1940, 1950]">1940 - 1950</option>
          <option value="[1950, 1960]">1950 - 1960</option>
          <option value="[1960, 1970]">1960 - 1970</option>
          <option value="[1970, 1980]">1970 - 1980</option>
          <option value="[1980, 1990]">1980 - 1990</option>
          <option value="[1990, 2000]">1990 - 2000</option>
          <option value="[2000, 2010]">2000 - 2010</option>
          <option value="[2010, 2020]">2010 - 2020</option>
          <option value="[2020, 2030]">2020 - 2030</option>
        </select>

        <label className="block mb-2">Número de Asientos</label>
        <input
          type="range"
          min="1"
          max="9"
          value={filters.seats[0]}
          onChange={(e) => handleSliderChange(e, "seats")}
          className="w-full mb-4"
        />
        <span>
          {filters.seats[0]} - {filters.seats[1]} Asientos
        </span>

        <button
          onClick={handleClearFilters}
          className={`p-2 rounded-lg mt-4 w-full text-white ${btnClear} transition-colors duration-300`}
        >
          Limpiar Filtros
        </button>
      </div>

      {/* CarCards */}
      <div className="w-full sm:w-3/4 p-4 flex flex-col">
        <CarCards
          cars={paginatedCars}
          loading={loading}
          addFavorites={addFavorites}
          removeFromData={removeFromData}
        />

        {/* Paginación */}
        {totalPages > 1 && (
          <div className="w-full flex justify-center mt-6 mb-10">
            <div className="flex gap-2 flex-wrap items-center">
              {/* Botón Anterior */}
              <button
                onClick={() => handlePageChange(currentPage - 1)}
                disabled={currentPage === 1}
                className={`
    px-3 py-2 rounded-lg text-sm font-semibold transition-colors duration-200
    ${currentPage === 1 ? "opacity-50 cursor-not-allowed" : ""}
    ${
      isDarkMode
        ? "bg-gray-700 text-gray-200 hover:bg-gray-600"
        : "bg-white text-gray-800 hover:bg-gray-100"
    }
  `}
              >
                &lt;
              </button>

              {/* Números de página con truncamiento */}
              {Array.from({ length: totalPages }, (_, i) => i + 1)
                .filter((page) => {
                  return (
                    page === 1 ||
                    page === totalPages ||
                    (page >= currentPage - 1 && page <= currentPage + 1)
                  );
                })
                .reduce((acc, page, index, array) => {
                  if (index > 0 && page - array[index - 1] > 1) {
                    acc.push("ellipsis");
                  }
                  acc.push(page);
                  return acc;
                }, [])
                .map((item, i) =>
                  item === "ellipsis" ? (
                    <span
                      key={`ellipsis-${i}`}
                      className="px-2 py-2 text-gray-500 dark:text-gray-400"
                    >
                      ...
                    </span>
                  ) : (
                    <button
                      key={item}
                      onClick={() => handlePageChange(item)}
                      disabled={currentPage === item}
                      className={`
                        px-4 py-2 rounded-lg text-sm font-semibold transition-colors duration-200
                        ${
                          currentPage === item
                            ? isDarkMode
                              ? "bg-blue-600 text-white"
                              : "bg-blue-100 text-blue-800 border border-blue-400 shadow-sm"
                            : isDarkMode
                            ? "bg-gray-700 text-gray-200 hover:bg-gray-600"
                            : "bg-white text-gray-800 hover:bg-gray-100"
                        }
                      `}
                    >
                      {item}
                    </button>
                  )
                )}

              {/* Botón Siguiente */}
              <button
                key={item}
                onClick={() => handlePageChange(item)}
                disabled={currentPage === item}
                className={`
    px-4 py-2 rounded-lg text-sm font-semibold transition-colors duration-200
    ${
      currentPage === item
        ? isDarkMode
          ? "bg-blue-600 text-white"
          : "bg-blue-100 text-blue-800 border border-blue-400 shadow-sm"
        : isDarkMode
        ? "bg-gray-700 text-gray-200 hover:bg-gray-600"
        : "bg-white text-gray-800 hover:bg-gray-100"
    }
  `}
              >
                &gt;
              </button>
            </div>
          </div>
        )}
      </div>
    </div>
  );
};

export default Home;
