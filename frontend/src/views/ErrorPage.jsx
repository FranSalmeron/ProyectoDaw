import React, { useState, useEffect, useRef, useCallback } from "react";
import { NavLink } from "react-router-dom";
import { toast } from "react-toastify";

const ErrorPage = () => {
  const carRef = useRef();
  const obstacleRef = useRef();
  const gameRef = useRef();
  const touchInterval = useRef(null);
  const [gameOver, setGameOver] = useState(false);
  const [score, setScore] = useState(0);
  const [carPosition, setCarPosition] = useState(50);
  const [obstaclePosition, setObstaclePosition] = useState(600);
  const [obstacleVerticalPosition, setObstacleVerticalPosition] = useState(0);
  const [obstacleSpeed, setObstacleSpeed] = useState(5);
  const [carDimensions, setCarDimensions] = useState({ width: 50, height: 50 });
  const [obstacleDimensions, setObstacleDimensions] = useState({
    width: 50,
    height: 50,
  });
  const [backgroundDimensions, setBackgroundDimensions] = useState({
    width: 569,
    height: 135,
  });

  const handleTouchStart = (direction) => {
    touchInterval.current = setInterval(() => {
      moveCar(direction);
    }, 100);
  };
  
  const handleTouchEnd = () => {
    clearInterval(touchInterval.current);
  };

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
      if (
        direction === "down" &&
        prevPosition < backgroundDimensions.height - (carDimensions.height - 20)
      ) {
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
          // 4 carriles: 0 (top), 1, 2, 3 (bottom)
          const laneHeight = backgroundDimensions.height / 4;
          const randomLane = Math.floor(Math.random() * 4);
          setObstacleVerticalPosition(
            laneHeight * randomLane +
              (laneHeight - obstacleDimensions.height * 0.4) / 2
          );

          const containerWidth =
            gameRef.current?.offsetWidth || backgroundDimensions.width;
          const offset = 25;
          return containerWidth - offset;
        }
        return prevPosition - obstacleSpeed;
      });
    }, 30);

    return () => clearInterval(obstacleInterval);
  }, [gameOver, obstacleDimensions, backgroundDimensions, obstacleSpeed]);

  useEffect(() => {
    if (gameOver) return;

    const checkCollision = () => {
      const carRect = carRef.current.getBoundingClientRect();
      const obstacleRect = obstacleRef.current.getBoundingClientRect();

      // Reducimos la hitbox en un pequeño margen para que las colisiones sean más justas
      const hitboxMargin = 5;

      const carHitbox = {
        top: carRect.top + hitboxMargin,
        bottom: carRect.bottom - hitboxMargin,
        left: carRect.left + hitboxMargin,
        right: carRect.right - hitboxMargin,
      };

      const obstacleHitbox = {
        top: obstacleRect.top + hitboxMargin,
        bottom: obstacleRect.bottom - hitboxMargin,
        left: obstacleRect.left + hitboxMargin,
        right: obstacleRect.right - hitboxMargin,
      };

      const isColliding =
        carHitbox.left < obstacleHitbox.right &&
        carHitbox.right > obstacleHitbox.left &&
        carHitbox.top < obstacleHitbox.bottom &&
        carHitbox.bottom > obstacleHitbox.top;

      if (isColliding) {
        toast.info("Game Over! Your Score: " + score);
        setGameOver(true);
        setScore(0);
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

      if (score % 1 === 0 && score !== 0) {
        setObstacleSpeed((prevSpeed) => prevSpeed + 1);
      }
    }, 1000);

    return () => clearInterval(scoreInterval);
  }, [gameOver, score]);

  const handleTouchMove = (direction) => {
    moveCar(direction);
  };

  const restartGame = () => {
    setGameOver(false);
    setScore(0);
    setObstacleSpeed(5);
    setObstaclePosition(backgroundDimensions.width);
    setCarPosition(0);
  };

  return (
    <div className="flex flex-col items-center justify-center min-h-screen bg-gray-100 p-6">
      <div className="text-center mb-8">
        <h1 className="text-4xl font-bold text-red-600">
          ¡Vaya! Algo salió mal...
        </h1>
        <p className="mt-4 text-lg text-gray-700">
          Parece que hemos tenido un problema. No te preocupes, puedes volver al
          inicio.
        </p>
      </div>

      {/* Puntuación */}
      <p className="top-4 left-4 text-black text-lg">{`Score: ${score}`}</p>


      {/* Cuadro del juego */}
      <div
        ref={gameRef}
        className="relative w-full h-full bg-cover bg-center"
        style={{
          backgroundImage: `url('/images/carretera.png')`,
          backgroundSize: `${backgroundDimensions.width}px ${
            backgroundDimensions.height / 2.5
          }px`, // Reducimos el ancho de la carretera un 10%
          backgroundPosition: "center",
          width: `${backgroundDimensions.width}px + ${carDimensions.width}px`,
          height: `${backgroundDimensions.height}px`,
        }}
      >
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

      {/* Botones táctiles (solo en móvil) */}
      <div className="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex justify-between w-3/4 px-4 md:hidden">
        <button
          className="w-20 h-20 bg-blue-500 text-white rounded-full text-xl hover:bg-blue-600 transition"
          onTouchStart={() => handleTouchStart("up")}
          onTouchEnd={handleTouchEnd}
        >
          ↑
        </button>
        <button
          className="w-20 h-20 bg-blue-500 text-white rounded-full text-xl hover:bg-blue-600 transition"
          onTouchStart={() => handleTouchStart("down")}
          onTouchEnd={handleTouchEnd}
        >
          ↓
        </button>
      </div>

      {gameOver && (
        <button
          onClick={restartGame}
          className="mt-6 bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition duration-300"
        >
          Jugar de nuevo
        </button>
      )}

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
