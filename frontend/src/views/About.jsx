import React, { useState,useEffect } from "react";
import { useDarkMode } from "../context/DarkModeContext";

const About = () => {
  const { isDarkMode } = useDarkMode();
  const [textPrimary, setTextPrimary] = useState(false);
  const [textSecondary, setTextSecondary] = useState(false);
  const [textMuted, setTextMuted] = useState(false);
  const [bgMain, setBgMain] = useState(false);
  const [bgCard, setBgCard] = useState(false);

  useEffect(() => {
    console.log(isDarkMode);
    setTextPrimary(isDarkMode ? "text-white" : "text-black");
    setTextSecondary(isDarkMode ? "text-gray-300" : "text-gray-700");
    setTextMuted(isDarkMode ? "text-gray-400" : "text-gray-600");
    setBgMain(isDarkMode ? "bg-[#1C1C1E]" : "bg-[#F5EFEB]");
    setBgCard(isDarkMode
      ? "bg-[#2C2C2E] border-gray-700"
      : "bg-white border-gray-200");
  }, [isDarkMode]);

  return (
    <div className={`max-w-full mx-auto px-6 py-10 min-h-screen ${bgMain}`}>
      {/* Header */}
      <header className="text-center mb-16">
        <h1 className={`text-4xl font-semibold ${textPrimary}`}>
          Sobre Nosotros
        </h1>
        <p className={`mt-2 text-lg ${textMuted}`}>
          Tu aliado confiable en la compra y venta de coches
        </p>
      </header>

      {/* Quiénes somos */}
      <section className="mb-16">
        <h2 className={`text-3xl font-semibold ${textPrimary}`}>
          Quiénes Somos
        </h2>
        <p className={`mt-4 text-lg ${textSecondary}`}>
          En <strong>RenovAuto</strong>, nos dedicamos a conectar compradores y
          vendedores de coches de manera sencilla, segura y confiable...
        </p>
      </section>

      {/* Nuestra Historia */}
      <section className="mb-16">
        <h2 className={`text-3xl font-semibold ${textPrimary}`}>
          Nuestra Historia
        </h2>
        <p className={`mt-4 text-lg ${textSecondary}`}>
          <strong>RenovAuto</strong> nació en 2025 con el objetivo de
          transformar...
        </p>
      </section>

      {/* Nuestro Equipo */}
      <section className="mb-16">
        <h2 className={`text-3xl font-semibold ${textPrimary}`}>
          Nuestro Equipo
        </h2>
        <p className={`mt-4 text-lg ${textSecondary}`}>
          Nuestro equipo está compuesto por expertos en el sector automotriz...
        </p>
        <div className="flex justify-center gap-12 mt-8 flex-wrap">
          <div className="text-center">
            <img
              src="/images/salmeron.jpg"
              alt="Francisco José Salmerón"
              className="rounded-full w-40 h-40 object-cover mx-auto"
            />
            <p className={`mt-2 text-lg ${textMuted}`}>
              Francisco José Salmerón - CEO y Programador
            </p>
          </div>
          <div className="text-center">
            <img
              src="/images/ismael.jpg"
              alt="Ismael Torres"
              className="rounded-full w-40 h-40 object-cover mx-auto"
            />
            <p className={`mt-2 text-lg ${textMuted}`}>
              Ismael Torres - Director de Marketing y Diseño
            </p>
          </div>
        </div>
      </section>

      {/* Testimonios */}
      <section className="mb-16">
        <h2 className={`text-3xl font-semibold ${textPrimary}`}>Testimonios</h2>
        <div className="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
          {[
            {
              quote:
                "¡Gracias a RenovAuto encontré el coche perfecto para mi familia! Todo el proceso fue sencillo y rápido. ¡Lo recomiendo al 100%!",
              name: "María López",
            },
            {
              quote:
                "Vender mi coche fue muy fácil, y el equipo de RenovAuto me guió en todo momento. ¡Definitivamente volveré a usar la plataforma!",
              name: "Carlos Rodríguez",
            },
            {
              quote:
                "Nunca pensé que comprar un coche seminuevo sería tan fácil. ¡Muy satisfecho con mi compra!",
              name: "Ana Martínez",
            },
            {
              quote:
                "Excelente atención al cliente. Me ayudaron a resolver todas mis dudas. ¡Gracias RenovAuto!",
              name: "Javier Méndez",
            },
          ].map((testimonial, index) => (
            <div
              key={index}
              className={`shadow-md rounded-2xl p-6 border ${bgCard}`}
            >
              <p className={`text-lg italic ${textSecondary}`}>
                “{testimonial.quote}”
              </p>
              <p className={`text-right font-semibold mt-4 ${textMuted}`}>
                – {testimonial.name}
              </p>
            </div>
          ))}
        </div>
      </section>

      {/* Contáctanos */}
      <section className="mb-16">
        <h2 className={`text-3xl font-semibold ${textPrimary}`}>Contáctanos</h2>
        <p className={`mt-4 text-lg ${textSecondary}`}>
          Si tienes alguna pregunta o necesitas ayuda, no dudes en ponerte en
          contacto con nosotros.
        </p>
        <ul className={`mt-4 text-lg ${textSecondary}`}>
          <li>
            <strong>Teléfono:</strong> +34 123 456 789
          </li>
          <li>
            <strong>Email:</strong> contacto@RenovAuto.com
          </li>
          <li>
            <strong>Dirección:</strong> Calle Automotriz 123, Ciudad, País
          </li>
        </ul>
      </section>
    </div>
  );
};

export default About;
