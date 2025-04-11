import React, { useState, useEffect, useRef, useCallback } from "react";
import { NavLink } from "react-router-dom";
import { toast } from "react-toastify";

const ErrorPage = () => {
  const carRef = useRef();
  const obstacleRef = useRef();
  const gameRef = useRef();
  const [gameOver, setGameOver] = useState(false);
  const [score, setScore] = useState(0);
  const [carPosition, setCarPosition] = useState(50);
  const [obstaclePosition, setObstaclePosition] = useState(600);
  const [obstacleVerticalPosition, setObstacleVerticalPosition] = useState(0);
  const [obstacleSpeed, setObstacleSpeed] = useState(5);
  const [carDimensions, setCarDimensions] = useState({ width: 50, height: 50 });
  const [obstacleDimensions, setObstacleDimensions] = useState({ width: 50, height: 50 });
  const [backgroundDimensions, setBackgroundDimensions] = useState({ width: 569, height: 135 });
  const randomHorizontalPosition = backgroundDimensions.width;

  const loadImageDimensions = useCallback((src, setDimensions) => {
    const img = new Image();
    img.onload = () => {
      setDimensions({ width: img.naturalWidth, height: img.naturalHeight });
    };
    img.src = src;
  }, []);

  useEffect(() => {
    loadImageDimensions("/images/car.png", setCarDimensions);
    loadImageDimensions("/images/car-enemy.png", setObstacleDimensions);
    loadImageDimensions("/images/carretera.png", setBackgroundDimensions);
  }, [loadImageDimensions]);

  const moveCar = (direction) => {
    if (gameOver) return;
    setCarPosition((prevPosition) => {
      if (direction === "up" && prevPosition > 0) return prevPosition - 10;
      if (direction === "down" && prevPosition < backgroundDimensions.height - carDimensions.height) {
        return prevPosition + 10;
      }
      return prevPosition;
    });
  };

  useEffect(() => {
    if (gameOver) return;

    const obstacleInterval = setInterval(() => {
      setObstaclePosition((prevPosition) => {
        if (prevPosition <= -obstacleDimensions.width) {
          const randomVerticalPosition = Math.floor(Math.random() * 3);
          if (randomVerticalPosition === 0) {
            setObstacleVerticalPosition(0);
          } else if (randomVerticalPosition === 1) {
            setObstacleVerticalPosition(backgroundDimensions.height / 2 - obstacleDimensions.height / 2);
          } else {
            setObstacleVerticalPosition(backgroundDimensions.height - obstacleDimensions.height);
          }

          // Ajustamos la posición horizontal del obstáculo para que empiece desde el final de la pantalla
          const randomHorizontalPosition = backgroundDimensions.width; // Inicia en el borde derecho
          return randomHorizontalPosition;
        }
        return prevPosition - obstacleSpeed;
      });
    }, 30);

    return () => clearInterval(obstacleInterval);
  }, [gameOver, obstacleDimensions.width, backgroundDimensions.width, obstacleDimensions.height, backgroundDimensions.height, obstacleSpeed]);


  useEffect(() => {
    if (gameOver) return;

    const checkCollision = () => {
      const carRect = carRef.current.getBoundingClientRect();
      const obstacleRect = obstacleRef.current.getBoundingClientRect();

      if (
        carRect.left < obstacleRect.right &&
        carRect.right > obstacleRect.left &&
        carRect.top < obstacleRect.bottom &&
        carRect.bottom > obstacleRect.top
      ) {
        toast.info("Game Over! Your Score: " + score);
        setGameOver(true);
        setScore(0); // Reiniciar puntuación
      }
    };

    checkCollision();
  }, [carPosition, obstaclePosition, gameOver, score]);

  useEffect(() => {
    const handleKeyDown = (event) => {
      if (event.key === "ArrowUp") moveCar("up");
      if (event.key === "ArrowDown") moveCar("down");
    };
    document.addEventListener("keydown", handleKeyDown);
    return () => {
      document.removeEventListener("keydown", handleKeyDown);
    };
  }, [gameOver]);

  useEffect(() => {
    if (gameOver) return;

    const scoreInterval = setInterval(() => {
      setScore((prevScore) => prevScore + 1);

      if (score % 3 === 0 && score !== 0) {
        setObstacleSpeed((prevSpeed) => prevSpeed + 1);
      }
    }, 1000);

    return () => clearInterval(scoreInterval);
  }, [gameOver, score]);

  const handleTouchMove = (direction) => {
    moveCar(direction);
  };

  return (
    <div className="flex flex-col items-center justify-center min-h-screen bg-gray-100 p-6">
      <div className="text-center mb-8">
        <h1 className="text-4xl font-bold text-red-600">¡Vaya! Algo salió mal...</h1>
        <p className="mt-4 text-lg text-gray-700">Parece que hemos tenido un problema. No te preocupes, puedes volver al inicio.</p>
      </div>

      {/* Cuadro del juego */}
      <div
        ref={gameRef}
        className="relative w-full h-full bg-cover bg-center"
        style={{
          backgroundImage: `url('/images/carretera.png')`,
          backgroundSize: `${backgroundDimensions.width}px ${backgroundDimensions.height / 2.5}px`, // Reducimos el ancho de la carretera un 10%
          backgroundPosition: "center",
          width: `${backgroundDimensions.width}px`,
          height: `${backgroundDimensions.height}px`,
        }}
      >
        {/* Puntuación */}
        <p className="absolute top-4 left-4 text-white text-lg">{`Score: ${score}`}</p>

        {/* Carro */}
        <div
          ref={carRef}
          className="absolute bg-contain"
          style={{
            top: `${carPosition}px`,
            left: "50px",
            width: `${carDimensions.width * 0.4}px`, // Hacemos los coches más pequeños (40% de su tamaño original)
            height: `${carDimensions.height * 0.4}px`, // Ajustamos la altura también
            backgroundImage: "url('/images/car.png')",
            transition: "top 0.1s ease-in-out",
          }}
        ></div>

        {/* Obstáculo */}
        <div
          ref={obstacleRef}
          className="absolute bg-contain"
          style={{
            top: `${obstacleVerticalPosition}px`,
            left: `${obstaclePosition}px`,
            width: `${obstacleDimensions.width * 0.4}px`, // Ajustamos el tamaño del obstáculo también
            height: `${obstacleDimensions.height * 0.4}px`,
            backgroundImage: "url('/images/car-enemy.png')",
          }}
        ></div>
      </div>

      {/* Botones táctiles */}
      <div className="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex justify-between w-3/4 px-4">
        <button
          className="w-20 h-20 bg-blue-500 text-white rounded-full text-xl hover:bg-blue-600 transition"
          onTouchStart={() => handleTouchMove("up")}
        >
          ↑
        </button>
        <button
          className="w-20 h-20 bg-blue-500 text-white rounded-full text-xl hover:bg-blue-600 transition"
          onTouchStart={() => handleTouchMove("down")}
        >
          ↓
        </button>
      </div>

      {/* Botón de Volver al Inicio */}
      <NavLink
        to="/"
        className="bg-blue-500 text-white py-2 px-6 rounded-lg hover:bg-blue-700 transition duration-300 mt-4"
      >
        Volver al Inicio
      </NavLink>
    </div>
  );
};

export default ErrorPage;
