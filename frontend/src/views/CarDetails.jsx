import React, { useState, useEffect, useRef } from 'react';
import { useLocation } from 'react-router-dom';  // Importamos useLocation para acceder al state
import { toast } from 'react-toastify'; 
import Slider from "react-slick";

const CarDetails = () => {
    const { state } = useLocation();  // Accedemos al state
    const car = state?.car;  // Tomamos el coche del state, si existe
    const [selectedImageIndex, setSelectedImageIndex] = useState(0); 
    const sliderRef = useRef(null);
    const [toastShown, setToastShown] = useState(false);  // Estado para controlar el toast

    // Verificamos si el coche está disponible
    if (!car && !toastShown) {
        setToastShown(true); // Aseguramos que el toast solo se muestre una vez
        toast.error('No se ha proporcionado un coche para mostrar');
        return <div>No se ha encontrado el coche</div>; // Mensaje en caso de que no se pase un coche
    }

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
                <h2 className="text-lg text-gray-500 mb-4">Vendedor: {car.User.name}</h2>

                <div className="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div className="car-detail-item">
                        <p className="text-gray-700 font-semibold">Ubicacion:</p>
                        <p className="text-gray-500">{car.city}</p>
                    </div>
                    <div className="car-detail-item">
                        <p className="text-gray-700 font-semibold">Precio:</p>
                        <p className="text-gray-500">{car.price} €</p>
                    </div>
                    {/* Agregar otros detalles del coche */}
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
