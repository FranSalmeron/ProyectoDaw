import React, { useState, useEffect } from 'react';
import { useCars } from '../context/CarContext';
import { carList } from '../helpers/carHelper';  // Importamos la función para obtener coches
import { toast } from 'react-toastify';
import CarCards from '../components/CarCards';
import { useFavorites } from '../context/FavoriteContext'; // Importamos el contexto de favoritos
import { getFavorites } from '../helpers/favoriteHelper'; // Importar las funciones necesarias
import { getUserIdFromToken } from '../helpers/decodeToken'; // Importar la función para obtener el userId del token

const Home = () => {
  const { cars, addCars } = useCars(); // Accedemos al contexto para obtener los coches y la función addCars
  const { addFavorites, removeFromData } = useFavorites();
  const [filters, setFilters] = useState({
    category: '',
    brand: '',
    traction: '',
    fuelType: '',
    seats: [1, 9],  // Rango de asientos (mínimo 2, máximo 7)
    price: [0, 50000],  // Rango de precio predeterminado
    mileage: [0, 200000], // Rango de kilometraje predeterminado
  });
  const [filteredCars, setFilteredCars] = useState([]);  // Inicialmente mostramos todos los coches
  const [showFilters, setShowFilters] = useState(false); // Para controlar la visibilidad de los filtros
  const [loading, setLoading] = useState(true);

   // Obtener el userId del token
   const userId = getUserIdFromToken() ? getUserIdFromToken() : null;
  
   useEffect(() => {
     const getCarsAndFavorites = async () => {
       setLoading(true);
       try {
         // Obtener favoritos primero
         await getFavorites(userId, addFavorites); // Se obtiene y se agregan al contexto
         // Luego obtener los coches
         await carList(addCars); // Se agregan los coches al contexto
         setLoading(false);
       } catch (error) {
         toast.error('No se pudieron cargar los coches o los favoritos. Intenta más tarde.');
         setLoading(false);
       }
     };
 
     getCarsAndFavorites();
    }, []); // Solo se ejecuta cuando el componente se monta

  useEffect(() => {
    // Cuando los coches cambian, se actualiza la lista filtrada
    setFilteredCars(cars);
  }, [cars]);  // Nos aseguramos de que los coches se actualicen si cambian

  useEffect(() => {
    // Aplicamos los filtros a los coches
    const applyFilters = () => {
      const filtered = cars.filter((car) => {
        // Comprobamos todos los filtros
        return (
          // Filtro por precio
          car.price >= filters.price[0] &&
          car.price <= filters.price[1] &&
          // Filtro por kilometraje
          car.mileage >= filters.mileage[0] &&
          car.mileage <= filters.mileage[1] &&
          // Filtro por asientos
          car.seats >= filters.seats[0] &&
          car.seats <= filters.seats[1] &&
          // Filtro por categoría
          (filters.category ? car.category.toLowerCase().includes(filters.category.toLowerCase()) : true) &&
          // Filtro por marca
          (filters.brand ? car.brand.toLowerCase().includes(filters.brand.toLowerCase()) : true) &&
          // Filtro por tracción
          (filters.traction ? car.traction.toLowerCase().includes(filters.traction.toLowerCase()) : true) &&
          // Filtro por tipo de combustible
          (filters.fuelType ? car.fuelType.toLowerCase().includes(filters.fuelType.toLowerCase()) : true) &&
          // Filtro por modelo (búsqueda parcial)
          (filters.model ? car.model.toLowerCase().includes(filters.model.toLowerCase()) : true) &&
          // Filtro por década
          (filters.decade
            ? (car.manufacture_year >= filters.decade[0] && car.manufacture_year < filters.decade[1])
            : true)
        );
      });
      setFilteredCars(filtered);
    };
    applyFilters();
  }, [filters, cars]);  // Re-aplicamos los filtros cuando cambian

  const handleClearFilters = () => {
    setFilters({
      category: '',
      brand: '',
      traction: '',
      fuelType: '',
      seats: [1, 9],
      price: [0, 1000000],
      mileage: [0, 200000],
      model: '',
      decade: '',
    });
  };

  const handleFilterChange = (e) => {
    setFilters({
      ...filters,
      [e.target.name]: e.target.value,
    });
  };

  return (
    <div className="flex flex-col sm:flex-row p-4">
      <button
        className="sm:hidden bg-blue-500 text-white p-2 rounded-lg mb-4"
        onClick={() => setShowFilters(!showFilters)}
      >
        {showFilters ? 'Ocultar Filtros' : 'Mostrar Filtros'}
      </button>

      <div
        className={`w-full sm:w-1/4 bg-gray-100 p-4 rounded-lg shadow-lg mb-4 sm:mb-0 transition-all duration-300 ease-in-out ${showFilters ? 'block' : 'hidden sm:block'}`}
      >
      {/* Filtros de búsqueda */}
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

      {/* Filtro por marca */}
      <label className="block mb-2">Marca</label>
      <select
        name="brand"
        value={filters.brand}
        onChange={handleFilterChange}
        className="p-2 border rounded w-full mb-4"
      >
      <option value="">Seleccionar marca</option>
      <option value="acura">Acura</option>
      <option value="alfa_romeo">Alfa Romeo</option>
      <option value="aston_martin">Aston Martin</option>
      <option value="audi">Audi</option>
      <option value="bentley">Bentley</option>
      <option value="bmw">BMW</option>
      <option value="bugatti">Bugatti</option>
      <option value="buick">Buick</option>
      <option value="chevrolet">Chevrolet</option>
      <option value="chrysler">Chrysler</option>
      <option value="citroen">Citroën</option>
      <option value="dodge">Dodge</option>
      <option value="fiat">Fiat</option>
      <option value="ford">Ford</option>
      <option value="ferrari">Ferrari</option>
      <option value="genesis">Genesis</option>
      <option value="gmc">GMC</option>
      <option value="honda">Honda</option>
      <option value="hyundai">Hyundai</option>
      <option value="infiniti">Infiniti</option>
      <option value="jaguar">Jaguar</option>
      <option value="jeep">Jeep</option>
      <option value="kia">Kia</option>
      <option value="land_rover">Land Rover</option>
      <option value="lamborghini">Lamborghini</option>
      <option value="lincoln">Lincoln</option>
      <option value="lexus">Lexus</option>
      <option value="mazda">Mazda</option>
      <option value="mclaren">McLaren</option>
      <option value="mercedes">Mercedes-Benz</option>
      <option value="mini">Mini</option>
      <option value="mitsubishi">Mitsubishi</option>
      <option value="maserati">Maserati</option>
      <option value="nissan">Nissan</option>
      <option value="opel">Opel</option>
      <option value="peugeot">Peugeot</option>
      <option value="porsche">Porsche</option>
      <option value="ram">Ram</option>
      <option value="renault">Renault</option>
      <option value="rolls_royce">Rolls-Royce</option>
      <option value="seat">Seat</option>
      <option value="skoda">Skoda</option>
      <option value="smart">Smart</option>
      <option value="subaru">Subaru</option>
      <option value="suzuki">Suzuki</option>
      <option value="tesla">Tesla</option>
      <option value="toyota">Toyota</option>
      <option value="volkswagen">Volkswagen</option>
      <option value="volvo">Volvo</option>
      </select>

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


      {/* Filtro por número de asientos*/}
      <label className="block mb-2">Número de Asientos</label>
      <input
        type="range"
        min="1"
        max="9"
        value={filters.seats[0]}
        onChange={(e) => handleSliderChange(e, 'seats')}
        className="w-full mb-4"
      />
      <span>{filters.seats[0]} - {filters.seats[1]} Asientos</span>

      {/* Rango de precios */}
      <label className="block mb-2">Rango de Precio</label>
      <input
        type="range"
        min="0"
        max="1000000"
        value={filters.price[0]}
        onChange={(e) => handleSliderChange(e, 'price')}
        className="w-full"
      />
      <span>{filters.price[0]} € - {filters.price[1]} €</span>

      {/* Rango de kilometraje */}
      <label className="block mb-2">Rango de Kilometraje</label>
      <input
        type="range"
        min="0"
        max="200000"
        value={filters.mileage[0]}
        onChange={(e) => handleSliderChange(e, 'mileage')}
        className="w-full"
      />
      <span>{filters.mileage[0]} km - {filters.mileage[1]} km</span>

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
        <CarCards cars={filteredCars} loading={loading} addFavorites={addFavorites} removeFromData={removeFromData} />
      </div>
    </div>
  );
};

export default Home;