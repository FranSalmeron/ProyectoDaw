import React, { useState } from "react";
import { useNavigate } from "react-router-dom";
import { ROUTES } from "../routes/paths";
import { toast } from "react-toastify";

const Banned = () => {
  const navigate = useNavigate();

  const [form, setForm] = useState({
    name: "",
    email: "",
    reason: "",
    message: "",
  });

  const handleLogout = () => {
    localStorage.clear();
    toast.info("Sesión cerrada");
    navigate(ROUTES.HOME);
  };

  const handleChange = (e) => {
    setForm({ ...form, [e.target.name]: e.target.value });
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    // Simulación de envío
    toast.success("Tu apelación ha sido enviada");
    setForm({
      name: "",
      email: "",
      reason: "",
      message: "",
    });
  };

  return (
    <div className="flex flex-col items-center justify-center min-h-screen p-6 bg-red-50 text-gray-800">
      <h1 className="text-4xl font-bold text-red-600 mb-2">Cuenta Baneada</h1>
      <p className="text-lg mb-4">Tu cuenta ha sido restringida del acceso.</p>
      <p className="text-sm mb-8 italic text-gray-600">
        Si crees que esto es un error o deseas apelar, completa el siguiente formulario:
      </p>

      <form
        onSubmit={handleSubmit}
        className="bg-white p-6 rounded shadow-md w-full max-w-md space-y-4"
      >
        <input
          type="text"
          name="name"
          placeholder="Nombre"
          value={form.name}
          onChange={handleChange}
          className="w-full border px-4 py-2 rounded"
          required
        />
        <input
          type="email"
          name="email"
          placeholder="Correo electrónico"
          value={form.email}
          onChange={handleChange}
          className="w-full border px-4 py-2 rounded"
          required
        />
        <input
          type="text"
          name="reason"
          placeholder="Motivo del baneo (si lo sabes)"
          value={form.reason}
          onChange={handleChange}
          className="w-full border px-4 py-2 rounded"
        />
        <textarea
          name="message"
          placeholder="Mensaje de apelación..."
          value={form.message}
          onChange={handleChange}
          className="w-full border px-4 py-2 rounded h-28 resize-none"
          required
        ></textarea>

        <button
          type="submit"
          className="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition"
        >
          Enviar apelación
        </button>
      </form>

      <button
        onClick={handleLogout}
        className="mt-6 text-sm text-gray-600 underline hover:text-gray-800"
      >
        Cerrar sesión
      </button>
    </div>
  );
};

export default Banned;
