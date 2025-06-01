import { useEffect, useState } from "react";
import { Bar, Pie } from "react-chartjs-2";
import "chart.js/auto";
import { fetchStatistics } from "../helpers/BuyHelper";
import dayjs from "dayjs";
import { useDarkMode } from "../context/DarkModeContext"; // Modo oscuro

const Statistics = () => {
  const [statistics, setStatistics] = useState({
    totalIncome: 0,
    totalTransactions: 0,
    monthlyEarnings: [],
    topBuyers: [],
    topCars: [],
    carStatusCount: {},
  });

  const { isDarkMode } = useDarkMode(); // Estado de modo oscuro

  useEffect(() => {
    const loadStats = async () => {
      try {
        const data = await fetchStatistics();
        setStatistics(data);
      } catch (err) {
        console.error("Error cargando estadísticas", err);
      }
    };

    loadStats();
  }, []);

  const getExtendedMonthlyEarnings = () => {
    const earningsMap = new Map(
      statistics.monthlyEarnings.map((e) => [e.month, e.income])
    );

    const now = dayjs();
    const months = [];

    for (let i = 0; i < 6; i++) {
      const month = now.subtract(5 - i, "month").format("YYYY-MM");
      months.push({
        month,
        income: earningsMap.get(month) || 0,
      });
    }
    return months;
  };

  const extendedMonthlyEarnings = getExtendedMonthlyEarnings();

  const monthlyEarningsData = {
    labels: extendedMonthlyEarnings.map((e) => e.month),
    datasets: [
      {
        label: "Ganancias Mensuales (€)",
        data: extendedMonthlyEarnings.map((e) => e.income),
        backgroundColor: "#36A2EB",
      },
    ],
  };

  const topBuyersData = {
    labels: statistics.topBuyers.map((user) => user.name),
    datasets: [
      {
        label: "Compras",
        data: statistics.topBuyers.map((user) => user.count),
        backgroundColor: "#FF6384",
      },
    ],
  };

  const generateColors = (count) => {
    const colors = [
      "#FF6384",
      "#36A2EB",
      "#FFCE56",
      "#4BC0C0",
      "#9966FF",
      "#FF9F40",
      "#8BC34A",
      "#00ACC1",
      "#E91E63",
      "#F44336",
    ];
    return Array.from({ length: count }, (_, i) => colors[i % colors.length]);
  };

  const topCarsData = {
    labels: statistics.topCars.map((car) => `${car.brand} ${car.model}`),
    datasets: [
      {
        label: "Ventas",
        data: statistics.topCars.map((car) => car.count),
        backgroundColor: generateColors(statistics.topCars.length),
      },
    ],
  };

  const carStatusData = {
    labels: ["Disponible", "Comprado", "Baneado"],
    datasets: [
      {
        label: "Estado de Coches",
        data: [
          statistics.carStatusCount.subido || 0,
          statistics.carStatusCount.comprado || 0,
          statistics.carStatusCount.baneado || 0,
        ],
        backgroundColor: ["#2196F3", "#4CAF50", "#F44336"],
      },
    ],
  };

  // 🎨 Estilos condicionales por tema
  const bgMain = isDarkMode
    ? "bg-[#1C1C1E] text-white"
    : "bg-[#F5EFEB] text-black";
  const cardBg = isDarkMode ? "bg-[#2C2C2E]" : "bg-white";
  const textPrimary = isDarkMode ? "text-white" : "text-gray-800";
  const accent = isDarkMode ? "text-blue-400" : "text-blue-600";

  return (
    <div
      className={`p-6 min-h-screen ${bgMain} transition-colors duration-300`}
    >
      <h1 className={`text-2xl font-bold mb-6 text-center ${textPrimary}`}>
        Estadísticas de Ventas
      </h1>

      <div className="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div className={`${cardBg} rounded-lg shadow-md p-4 text-center`}>
          <h3 className="text-lg font-semibold">Ingresos Totales</h3>
          <p className={`text-xl ${accent}`}>{statistics.totalIncome} €</p>
        </div>
        <div className={`${cardBg} rounded-lg shadow-md p-4 text-center`}>
          <h3 className="text-lg font-semibold">Total de Transacciones</h3>
          <p className={`text-xl ${accent}`}>{statistics.totalTransactions}</p>
        </div>
      </div>

      <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div className={`${cardBg} rounded-lg shadow-md p-4`}>
          <h3 className="text-lg font-semibold mb-2">Ganancias Mensuales</h3>
          <Bar data={monthlyEarningsData} />
        </div>

        <div className={`${cardBg} rounded-lg shadow-md p-4`}>
          <h3 className="text-lg font-semibold mb-2">
            Usuarios con Más Compras
          </h3>
          <Bar data={topBuyersData} />
        </div>

        <div className={`${cardBg} rounded-lg shadow-md p-4`}>
          <h3 className="text-lg font-semibold mb-2">Coches Más Vendidos</h3>
          <Pie data={topCarsData} />
        </div>

        <div className={`${cardBg} rounded-lg shadow-md p-4`}>
          <h3 className="text-lg font-semibold mb-2">Estados de los Coches</h3>
          <Pie data={carStatusData} />
        </div>
      </div>
    </div>
  );
};

export default Statistics;
