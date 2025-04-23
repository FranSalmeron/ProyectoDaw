import React from "react";
import "./LoadingSpinner.css"; // Asegúrate de que la ruta sea correcta

const LoadingSpinner = () => {
  return (
    <div className="bg-[#F5EFEB] min-w-screen">
      <div className="flex justify-center items-center min-h-screen bg-[#F5EFEB] opacity-75">
        <div className="spinner"></div>
      </div>
    </div>
  );
};

export default LoadingSpinner;
