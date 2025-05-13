import { useEffect, useState } from "react";
import { Line, Bar, Pie } from "react-chartjs-2";
import "chart.js/auto";
import { fetchStatistics } from "../helpers/BuyHelper"; 

const Statistics = () => {
  const [statistics, setStatistics] = useState({
    totalIncome: 0,
    totalTransactions: 0,
    monthlyEarnings: [],
    topBuyers: [],
    topCars: [],
    statusCount: {},
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

  const monthlyEarningsData = {
    labels: statistics.monthlyEarnings.map((e) => e.month),
    datasets: [
      {
        label: "Ganancias Mensuales (€)",
        data: statistics.monthlyEarnings.map((e) => e.income),
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
    labels: statistics.topCars.map((car) => car.name),
    datasets: [
      {
        label: "Ventas",
        data: statistics.topCars.map((car) => car.count),
        backgroundColor: "#FFCE56",
      },
    ],
  };

  const statusCountData = {
    labels: Object.keys(statistics.statusCount),
    datasets: [
      {
        label: "Estado de transacciones",
        data: Object.values(statistics.statusCount),
        backgroundColor: ["#4CAF50", "#FFC107", "#F44336"],
      },
    ],
  };

  return (
    <div className="statistics-container">
      <h1>Estadísticas de Ventas</h1>
      <div className="overview">
        <div className="stat-card">
          <h3>Ingresos Totales</h3>
          <p>{statistics.totalIncome} €</p>
        </div>
        <div className="stat-card">
          <h3>Total de Transacciones</h3>
          <p>{statistics.totalTransactions}</p>
        </div>
      </div>

      <div className="charts">
        <div className="chart-container">
          <h3>Ganancias Mensuales</h3>
          <Bar data={monthlyEarningsData} />
        </div>
        <div className="chart-container">
          <h3>Usuarios con Más Compras</h3>
          <Bar data={topBuyersData} />
        </div>
        <div className="chart-container">
          <h3>Coches Más Vendidos</h3>
          <Pie data={topCarsData} />
        </div>
        <div className="chart-container">
          <h3>Estados de Transacciones</h3>
          <Bar data={statusCountData} />
        </div>
      </div>
    </div>
  );
};

export default Statistics;