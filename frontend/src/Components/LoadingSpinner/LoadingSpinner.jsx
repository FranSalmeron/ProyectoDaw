import React from "react";
import "./LoadingSpinner.css"; // Asegúrate de que la ruta sea correcta

const LoadingSpinner = () => {
  return (
    <div className="fixed inset-0 flex justify-center items-center z-50">
      <div className="spinner"></div>
    </div>
  );
};

export default LoadingSpinner;
