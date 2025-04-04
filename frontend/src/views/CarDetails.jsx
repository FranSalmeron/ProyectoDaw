import React, { useState, useRef, useEffect } from 'react';
import { toast } from 'react-toastify';
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css"; 
import Slider from "react-slick";
import { getUserIdFromToken } from '../helpers/decodeToken';
import { useNavigate, useLocation } from 'react-router-dom';

const CarDetails = () => {
    const [selectedImageIndex, setSelectedImageIndex] = useState(0);
    const sliderRef = useRef(null);
    const [toastShown, setToastShown] = useState(false);  // Estado para controlar el toast
    const navigate = useNavigate();
    const location = useLocation();  // Usamos useLocation para obtener el estado de la navegación

    // Obtenemos el coche desde el state de la navegación
    const car = location.state?.car;

    // Mostrar el toast solo si el coche no está disponible y asegurarse de que solo se muestre una vez
    useEffect(() => {
        if (!car && !toastShown) {
            setToastShown(true); // Aseguramos que el toast solo se muestre una vez
            toast.error('No se ha proporcionado un coche para mostrar');
            navigate('/'); // Redirigir a la página de inicio si no se proporciona un coche
        }
    }, [car, toastShown, navigate]);

    // Configuración del carrusel
    const settings = {
        dots: true, 
        infinite: false, 
        speed: 500, 
        slidesToShow: 1, 
        slidesToScroll: 1, 
        selectedSlide: selectedImageIndex,
        nextArrow: <div className="slick-next">→</div>, 
        prevArrow: <div className="slick-prev">←</div>, 
    };

    // Función para cambiar la imagen principal 
    const handleImageClick = (index) => {
        setSelectedImageIndex(index);  
        sliderRef.current.slickGoTo(index);
    };

    // Verificar si el usuario está autenticado
    const isAuthenticated = () => {
        const token = localStorage.getItem('jwt'); 
        return token ? true : false;
    };

    // Función para manejar el clic en "Comprar"
    const handleBuyClick = () => {
        if (!isAuthenticated()) {
            toast.error('Debes estar registrado para comprar.');
            navigate('/login'); // Redirigir al login si no está autenticado
        } else {
            toast.success('Redirigiendo a la página de compra.');
            navigate('/buy_car'); // Redirige a la página de compra
        }
    };

    // Función para manejar el clic en "Chatear"
    const handleChatClick = () => {
        if (!isAuthenticated()) {
            toast.error('Debes estar registrado para chatear.');
            navigate('/login'); // Redirige al login si no está autenticado
        } else {
            const currentUserId = getUserIdFromToken();
            navigate(`/chat/${currentUserId}/${car.id}/${car.buyerId}`);  // Redirige a la página de chat
        }
    };

    // Si no se pasa el coche como estado, mostramos un mensaje de error.
    if (!car) {
        return <div>No se ha encontrado el coche</div>;
    }

    return (
        <div className="car-details p-6 max-w-4xl mx-auto bg-white rounded-lg shadow-lg mt-6 mb-6">
            {/* Carrusel de imágenes */}
            <div className="car-images mb-6">
                <Slider ref={sliderRef} {...settings}>
                    {car.images.map((image, index) => (
                        <div key={index}>
                            <img
                                src={image}
                                alt={`Car image ${index + 1}`}
                                className="w-full h-auto object-cover rounded-lg shadow-md"
                            />
                        </div>
                    ))}
                </Slider>
            </div>

            {/* Fila de miniaturas de imágenes */}
            <div className="image-thumbnails flex space-x-4 overflow-x-auto mb-6">
                {car.images.map((image, index) => (
                    <div
                        key={index}
                        className="w-20 h-20 cursor-pointer"
                        onClick={() => handleImageClick(index)} // Actualiza la imagen seleccionada
                    >
                        <img
                            src={image}
                            alt={`Thumbnail ${index + 1}`}
                            className={`w-full h-full object-cover rounded-lg hover:opacity-80 ${
                                selectedImageIndex === index ? 'border-4 border-blue-500' : ''
                            }`} // Resalta la miniatura seleccionada
                        />
                    </div>
                ))}
            </div>

            {/* Información del coche */}
            <div className="car-info mt-6">
                <h1 className="text-3xl font-semibold text-gray-800 mb-2">{car.brand} {car.model}</h1>
                <h2 className="text-lg text-gray-500 mb-4">Vendedor: {car.user.name}</h2>

                {/* Información del coche */}
                <div className="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div className="car-detail-item">
                        <p className="text-gray-700 font-semibold">Ubicacion:</p>
                        <p className="text-gray-500">{car.city}</p>
                    </div>
                    <div className="car-detail-item">
                        <p className="text-gray-700 font-semibold">Precio:</p>
                        <p className="text-gray-500">{car.price} €</p>
                    </div>
                    <div className="car-detail-item">
                        <p className="text-gray-700 font-semibold">Año:</p>
                        <p className="text-gray-500">{car.manufacture_year}</p>
                    </div>
                    <div className="car-detail-item">
                        <p className="text-gray-700 font-semibold">Kilómetros:</p>
                        <p className="text-gray-500">{car.mileage} km</p>
                    </div>
                    <div className="car-detail-item">
                        <p className="text-gray-700 font-semibold">Combustible:</p>
                        <p className="text-gray-500">{car.fuelType}</p>
                    </div>
                    <div className="car-detail-item">
                        <p className="text-gray-700 font-semibold">Condición:</p>
                        <p className="text-gray-500">{car.CarCondition}</p>
                    </div>
                    <div className="car-detail-item">
                        <p className="text-gray-700 font-semibold">Tracción:</p>
                        <p className="text-gray-500">{car.traction}</p>
                    </div>
                    <div className="car-detail-item">
                        <p className="text-gray-700 font-semibold">Puertas:</p>
                        <p className="text-gray-500">{car.doors}</p>
                    </div>
                    <div className="car-detail-item">
                        <p className="text-gray-700 font-semibold">Asientos:</p>
                        <p className="text-gray-500">{car.seats}</p>
                    </div>
                    <div className="car-detail-item">
                        <p className="text-gray-700 font-semibold">Transmisión:</p>
                        <p className="text-gray-500">{car.transmission}</p>
                    </div>
                    <div className="car-detail-item">
                        <p className="text-gray-700 font-semibold">Color:</p>
                        <p className="text-gray-500">{car.color}</p>
                    </div>
                    <div className="car-detail-item">
                        <p className="text-gray-700 font-semibold">Fecha Publicación:</p>
                        <p className="text-gray-500">{new Date(car.publication_date).toLocaleDateString()}</p>
                    </div>
                    <div className="car-detail-item">
                        <p className="text-gray-700 font-semibold">Descripcion:</p>
                        <p className="text-gray-500">{car.description}</p>
                    </div>
                </div>
            </div>

            {/* Botones de acción */}
            <div className="car-actions mt-6 flex justify-between">
                <button 
                    onClick={handleBuyClick} 
                    className="btn bg-blue-500 text-white p-3 rounded-md w-1/3"
                >
                    Comprar
                </button>
                <button 
                    onClick={handleChatClick} 
                    className="btn bg-green-500 text-white p-3 rounded-md w-1/3"
                >
                    Chatear
                </button>
            </div>
        </div>
    );
};

export default CarDetails;
