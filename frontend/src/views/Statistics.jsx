import { useEffect, useState } from "react";
import { Bar, Pie } from "react-chartjs-2";
import "chart.js/auto";
import { fetchStatistics } from "../helpers/BuyHelper";
import dayjs from "dayjs";

const Statistics = () => {
  const [statistics, setStatistics] = useState({
    totalIncome: 0,
    totalTransactions: 0,
    monthlyEarnings: [],
    topBuyers: [],
    topCars: [],
    carStatusCount: {}, // solo este
  });

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

  // Rellenar hasta 6 meses incluso si están vacíos
  const getExtendedMonthlyEarnings = () => {
    const earningsMap = new Map(
      statistics.monthlyEarnings.map((e) => [e.month, e.income])
    );

    const now = dayjs();
    const months = [];

    for (let i = 0; i < 6; i++) {
      const month = now.add(i, "month").format("YYYY-MM");
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

  const topCarsData = {
    labels: statistics.topCars.map((car) => `${car.brand} ${car.model}`),
    datasets: [
      {
        label: "Ventas",
        data: statistics.topCars.map((car) => car.count),
        backgroundColor: "#FFCE56",
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

  return (
    <div className="p-6">
      <h1 className="text-2xl font-bold mb-6 text-center">
        Estadísticas de Ventas
      </h1>

      <div className="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div className="bg-white rounded-lg shadow-md p-4 text-center">
          <h3 className="text-lg font-semibold">Ingresos Totales</h3>
          <p className="text-xl text-blue-600">{statistics.totalIncome} €</p>
        </div>
        <div className="bg-white rounded-lg shadow-md p-4 text-center">
          <h3 className="text-lg font-semibold">Total de Transacciones</h3>
          <p className="text-xl text-blue-600">
            {statistics.totalTransactions}
          </p>
        </div>
      </div>

      <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div className="bg-white rounded-lg shadow-md p-4">
          <h3 className="text-lg font-semibold mb-2">Ganancias Mensuales</h3>
          <Bar data={monthlyEarningsData} height={300} />
        </div>

        <div className="bg-white rounded-lg shadow-md p-4">
          <h3 className="text-lg font-semibold mb-2">
            Usuarios con Más Compras
          </h3>
          <Bar data={topBuyersData} height={300} />
        </div>

        <div className="bg-white rounded-lg shadow-md p-4">
          <h3 className="text-lg font-semibold mb-2">Coches Más Vendidos</h3>
          <Pie data={topCarsData} height={300} />
        </div>

        <div className="bg-white rounded-lg shadow-md p-4">
          <h3 className="text-lg font-semibold mb-2">Estados de los Coches</h3>
          <Pie data={carStatusData} height={300} />
        </div>
      </div>
    </div>
  );
};

export default Statistics;
