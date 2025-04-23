import React from "react";

const About = () => {
  return (
    <div className="max-w-full mx-auto px-6 py-10 bg-[#F5EFEB]">
      {/* Header */}
      <header className="text-center mb-16">
        <h1 className="text-4xl font-semibold text-gray-800">Sobre Nosotros</h1>
        <p className="mt-2 text-lg text-gray-500">
          Tu aliado confiable en la compra y venta de coches
        </p>
      </header>

      {/* Quiénes somos */}
      <section className="mb-16">
        <h2 className="text-3xl font-semibold text-gray-800">Quiénes Somos</h2>
        <p className="mt-4 text-lg text-gray-700">
          En <strong>RenovAuto</strong>, nos dedicamos a conectar compradores y
          vendedores de coches de manera sencilla, segura y confiable. Nuestra
          misión es hacer que la compra y venta de vehículos sea una experiencia
          libre de estrés, ofreciendo un espacio transparente y accesible para
          todos. Nos apasiona el mundo automotriz y estamos aquí para hacer que
          encontrar tu coche ideal o vender tu vehículo sea un proceso rápido y
          seguro.
        </p>
      </section>

      {/* Nuestra Historia */}
      <section className="mb-16">
        <h2 className="text-3xl font-semibold text-gray-800">
          Nuestra Historia
        </h2>
        <p className="mt-4 text-lg text-gray-700">
          <strong>RenovAuto</strong> nació en 2025 con el objetivo de
          transformar la manera en que las personas compran y venden coches.
          Empezamos con la idea de crear una plataforma fácil de usar, sin las
          complicaciones que suelen tener las compras tradicionales. Desde
          entonces, hemos crecido y ayudado a miles de usuarios a encontrar su
          coche perfecto o vender sus vehículos de forma sencilla, sin
          intermediarios innecesarios.
        </p>
      </section>

      {/* Nuestro Equipo */}
      <section className="mb-16">
        <h2 className="text-3xl font-semibold text-gray-800">Nuestro Equipo</h2>
        <p className="mt-4 text-lg text-gray-700">
          Nuestro equipo está compuesto por expertos en el sector automotriz,
          tecnología y atención al cliente. Todos compartimos una visión común:
          hacer que cada transacción sea segura y sin estrés. Ya sea que busques
          un coche de segunda mano o quieras vender el tuyo, nuestro equipo está
          aquí para ayudarte en cada paso del proceso.
        </p>
        <div className="flex justify-center gap-12 mt-8">
          <div className="text-center">
            <img
              src="/images/salmeron.jpg"
              alt="Francisco José Salmerón"
              className="rounded-full w-45 h-45 object-cover mx-auto"
            />
            <p className="mt-2 text-lg text-gray-600">
              Franciso José Salmerón - CEO y Programador
            </p>
          </div>
          <div className="text-center">
            <img
              src="/images/ismael.jpg"
              alt="Ismael Torres"
              className="rounded-full w-45 h-45 object-cover mx-auto"
            />
            <p className="mt-2 text-lg text-gray-600">
              Ismael Torres - Director de Marketing y Diseño
            </p>
          </div>
        </div>
      </section>

      {/* Testimonios */}
      <section className="mb-16">
        <h2 className="text-3xl font-semibold text-gray-800">Testimonios</h2>
        <div className="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
          <div className="bg-white shadow-md rounded-2xl p-6 border border-gray-200">
            <p className="text-lg text-gray-700 italic">
              “¡Gracias a RenovAuto encontré el coche perfecto para mi familia!
              Todo el proceso fue sencillo y rápido, sin sorpresas. ¡Lo
              recomiendo al 100%!”
            </p>
            <p className="text-right text-gray-600 font-semibold mt-4">
              – María López
            </p>
          </div>
          <div className="bg-white shadow-md rounded-2xl p-6 border border-gray-200">
            <p className="text-lg text-gray-700 italic">
              “Vender mi coche fue muy fácil, y el equipo de RenovAuto me guió
              en todo momento. ¡Definitivamente volveré a usar la plataforma!”
            </p>
            <p className="text-right text-gray-600 font-semibold mt-4">
              – Carlos Rodríguez
            </p>
          </div>
          <div className="bg-white shadow-md rounded-2xl p-6 border border-gray-200">
            <p className="text-lg text-gray-700 italic">
              “Nunca pensé que comprar un coche seminuevo sería tan fácil. El
              sitio es claro, seguro y con muchas opciones. ¡Muy satisfecho con
              mi compra!”
            </p>
            <p className="text-right text-gray-600 font-semibold mt-4">
              – Ana Martínez
            </p>
          </div>
          <div className="bg-white shadow-md rounded-2xl p-6 border border-gray-200">
            <p className="text-lg text-gray-700 italic">
              “Excelente atención al cliente. Me ayudaron a resolver todas mis
              dudas y el coche llegó en perfectas condiciones. ¡Gracias
              RenovAuto!”
            </p>
            <p className="text-right text-gray-600 font-semibold mt-4">
              – Javier Méndez
            </p>
          </div>
        </div>
      </section>

      {/* Contáctanos */}
      <section className="mb-16">
        <h2 className="text-3xl font-semibold text-gray-800">Contáctanos</h2>
        <p className="mt-4 text-lg text-gray-700">
          Si tienes alguna pregunta o necesitas ayuda, no dudes en ponerte en
          contacto con nosotros. Estamos aquí para ayudarte.
        </p>
        <ul className="mt-4 text-lg text-gray-700">
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
