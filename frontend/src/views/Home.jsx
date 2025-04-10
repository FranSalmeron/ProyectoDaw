import React, { useState, useEffect } from "react";
import { useCars } from "../context/CarContext";
import { carList } from "../helpers/carHelper"; 
import { toast } from "react-toastify";
import CarCards from "../components/CarCards";
import { useFavorites } from "../context/FavoriteContext"; 
import { getFavorites } from "../helpers/favoriteHelper"; 
import { getUserIdFromToken } from "../helpers/decodeToken"; 

const Home = () => {
  const { cars, addCars } = useCars(); 
  const { addFavorites, removeFromData } = useFavorites();
  const [filters, setFilters] = useState({
    city: "",
    category: "",
    brand: "",
    traction: "",
    fuelType: "",
    seats: [1, 9], 
    price: { min: 0, max: 1000000 }, 
    mileage: { min: 0, max: 500000 },  
  });
  const [filteredCars, setFilteredCars] = useState([]); 
  const [showFilters, setShowFilters] = useState(false); 
  const [loading, setLoading] = useState(true);

  const userId = getUserIdFromToken() ? getUserIdFromToken() : null;

  useEffect(() => {
    const getCarsAndFavorites = async () => {
      setLoading(true);
      try {
        await getFavorites(userId, addFavorites); 
        await carList(addCars); 
        setLoading(false);
      } catch (error) {
        toast.error("No se pudieron cargar los coches o los favoritos. Intenta más tarde.");
        setLoading(false);
      }
    };

    getCarsAndFavorites();
  }, []); 

  useEffect(() => {
    setFilteredCars(cars);
  }, [cars]); 

  useEffect(() => {
    const applyFilters = () => {
      const filtered = cars.filter((car) => {
        // Filtra por ciudad
        const cityMatch = filters.city ? car.city.toLowerCase().includes(filters.city.toLowerCase()) : true;
        
        // Filtra por precio (min y max)
        const priceMatch = car.price >= Number(filters.price.min) && car.price <= Number(filters.price.max);
        
        // Filtra por kilometraje (min y max)
        const mileageMatch = car.mileage >= Number(filters.mileage.min) && car.mileage <= Number(filters.mileage.max);
        
        // Filtra por asientos
        const seatsMatch = car.seats >= filters.seats[0] && car.seats <= filters.seats[1];
        
        // Filtra por categoría
        const categoryMatch = filters.category ? car.category.toLowerCase().includes(filters.category.toLowerCase()) : true;
        
        // Filtra por marca
        const brandMatch = filters.brand ? car.brand.toLowerCase().includes(filters.brand.toLowerCase()) : true;
        
        // Filtra por tracción
        const tractionMatch = filters.traction ? car.traction.toLowerCase().includes(filters.traction.toLowerCase()) : true;
        
        // Filtra por tipo de combustible
        const fuelTypeMatch = filters.fuelType ? car.fuelType.toLowerCase().includes(filters.fuelType.toLowerCase()) : true;
        
        // Filtra por modelo
        const modelMatch = filters.model ? car.model.toLowerCase().includes(filters.model.toLowerCase()) : true;
        
        // Filtra por década
        const decadeMatch = filters.decade ? car.manufacture_year >= filters.decade[0] && car.manufacture_year < filters.decade[1] : true;
  
        // Si todas las condiciones se cumplen, el coche pasa el filtro
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
  
      setFilteredCars(filtered);
    };
    applyFilters();
  }, [filters, cars]);

  const handleSliderChange = (e, field) => {
    const value = Number(e.target.value); // El valor del slider
    setFilters((prevFilters) => {
      let updatedFilters = { ...prevFilters };
      if (field === "seats") {
        updatedFilters.seats[0] = value; // Actualiza el valor mínimo
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

  const cities = ["Álava", "Ávila", "Alicante", "Algeciras", "Alcalá de Henares", "Almería", "Badalona", "Badajoz", "Barcelona", "Bilbao", "Burgos", "Cádiz", "Cáceres", "Castellón de la Plana", "Córdoba", "Cuenca", "Elche", "Gerona", "Granada", "Gijón", "Huelva", "Huesca", "La Coruña", "La Rasa", "La Rioja", "L'Hospitalet de Llobregat", "Lleida", "Logroño", "Madrid", "Málaga", "Marbella", "Mataró", "Melilla", "Murcia", "Madrid", "Oviedo", "Ourense", "Pamplona", "Pontevedra", "Reus", "Salamanca", "San Cristóbal de La Laguna", "San Sebastián", "Santa Cruz de Tenerife", "Segovia", "Soria", "Santander", "Sevilla", "Toledo", "Terrassa", "Valencia", "Valladolid", "Vigo", "Zaragoza"];
  const carBrands = ["Acura", "Alfa Romeo", "Aston Martin", "Audi", "Bentley", "BMW", "Bugatti", "Buick", "Chevrolet", "Chrysler", "Citroën", "Dodge", "Fiat", "Ford", "Ferrari", "Genesis", "GMC", "Honda", "Hyundai", "Infiniti", "Jaguar", "Jeep", "Kia", "Land Rover", "Lamborghini", "Lincoln", "Lexus", "Mazda", "McLaren", "Mercedes-Benz", "Mini", "Mitsubishi", "Maserati", "Nissan", "Opel", "Peugeot", "Porsche", "Ram", "Renault", "Rolls-Royce", "Seat", "Skoda", "Smart", "Subaru", "Suzuki", "Tesla", "Toyota", "Volkswagen", "Volvo"];

  return (
    <div className="flex flex-col sm:flex-row p-4 bg-[#F5EFEB]">
      <button
        className="sm:hidden bg-blue-500 text-white p-2 rounded-lg mb-4"
        onClick={() => setShowFilters(!showFilters)}
      >
        {showFilters ? "Ocultar Filtros" : "Mostrar Filtros"}
      </button>

      <div
        className={`w-full sm:w-1/4 bg-gray-100 p-4 rounded-lg shadow-lg mb-4 sm:mb-0 transition-all duration-300 ease-in-out ${showFilters ? "block" : "hidden sm:block"}`}
      >
        <h3 className="text-xl font-semibold mb-4">Filtros de Búsqueda</h3>

        {/* Filtro por modelo */}
        <label className="block mb-2">Buscar por modelo</label>
        <input
          type="text"
          name="model"
          value={filters.model}
          onChange={handleFilterChange}
          className="p-2 border rounded w-full mb-4"
          placeholder="Ej: corolla"
        />

        {/* Filtro por Marca */}
        <label className="block mb-2">Marca</label>
        <select
          name="brand"
          value={filters.brand}
          onChange={handleFilterChange}
          className="p-2 border rounded w-full mb-4"
        >
          <option value="">Seleccionar marca</option>
          {carBrands.map((brand, index) => (
            <option key={index} value={brand.toLowerCase().replace(/\s+/g, "_")}>
              {brand}
            </option>
          ))}
        </select>

        {/* Filtro por ciudad */}
        <label className="block mb-2">Seleccionar Ciudad</label>
        <select
          name="city"
          value={filters.city}
          onChange={handleFilterChange}
          className="p-2 border rounded w-full mb-4"
        >
          <option value="">Seleccionar ciudad</option>
          {cities.map((city, index) => (
            <option key={index} value={city}>
              {city}
            </option>
          ))}
        </select>

        {/* Filtro por precio */}
        <label className="block mb-2">Rango de Precio</label>
        <div className="flex mb-4">
          <input
            type="number"
            name="priceMin"
            value={filters.price.min}
            onChange={(e) => setFilters({ ...filters, price: { ...filters.price, min: e.target.value } })}
            className="p-2 border rounded w-1/2 mr-2"
            placeholder="Mínimo"
          />
          <input
            type="number"
            name="priceMax"
            value={filters.price.max}
            onChange={(e) => setFilters({ ...filters, price: { ...filters.price, max: e.target.value } })}
            className="p-2 border rounded w-1/2"
            placeholder="Máximo"
          />
        </div>

        {/* Filtro por kilometraje  */}
        <label className="block mb-2">Rango de Kilometraje</label>
        <div className="flex mb-4">
          <input
            type="number"
            name="mileageMin"
            value={filters.mileage.min}
            onChange={(e) => setFilters({ ...filters, mileage: { ...filters.mileage, min: e.target.value } })}
            className="p-2 border rounded w-1/2 mr-2"
            placeholder="Mínimo"
          />
          <input
            type="number"
            name="mileageMax"
            value={filters.mileage.max}
            onChange={(e) => setFilters({ ...filters, mileage: { ...filters.mileage, max: e.target.value } })}
            className="p-2 border rounded w-1/2"
            placeholder="Máximo"
          />
        </div>

        {/* Filtro por tracción */}
        <label className="block mb-2">Tracción</label>
        <select
          name="traction"
          value={filters.traction}
          onChange={handleFilterChange}
          className="p-2 border rounded w-full mb-4"
        >
          <option value="">Seleccionar tracción</option>
          <option value="delantera">Delantera</option>
          <option value="trasera">Trasera</option>
          <option value="total">Total</option>
        </select>

        {/* Filtro por tipo de combustible */}
        <label className="block mb-2">Tipo de Combustible</label>
        <select
          name="fuelType"
          value={filters.fuelType}
          onChange={handleFilterChange}
          className="p-2 border rounded w-full mb-4"
        >
          <option value="">Seleccionar combustible</option>
          <option value="gasoline">Gasolina</option>
          <option value="diesel">Diesel</option>
          <option value="electric">Eléctrico</option>
          {/* Otras opciones de combustible */}
        </select>

        {/* Filtro por década */}
        <label className="block mb-2">Filtrar por década</label>
        <select
          name="decade"
          value={filters.decade}
          onChange={(e) => {
            // Convertir el valor del select en un array de números
            const selectedDecade = JSON.parse(e.target.value);
            setFilters({
              ...filters,
              decade: selectedDecade,
            });
          }}
          className="p-2 border rounded w-full mb-4"
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
          {/* Agregar más décadas si es necesario */}
        </select>

        {/* Filtro por número de asientos */}
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
 
        {/* Botón de Limpiar Filtros */}
        <button
          onClick={handleClearFilters}
          className="bg-red-500 text-white p-2 rounded-lg mt-4 w-full"
        >
          Limpiar Filtros
        </button>
      </div>

      <div className="w-full sm:w-3/4 p-4">
        {/* Aquí se usa el componente CarCards para mostrar los coches filtrados */}
        <CarCards
          cars={filteredCars}
          loading={loading}
          addFavorites={addFavorites}
          removeFromData={removeFromData}
        />
      </div>
    </div>
  );
};

export default Home;
