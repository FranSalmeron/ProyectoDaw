import React, { useEffect, useState } from "react";
import { listChats } from "../helpers/chatHelper";
import { useChats } from "../context/ChatContext";
import { toast } from "react-toastify";
import { getUserIdFromToken } from "../helpers/decodeToken";
import { useNavigate } from "react-router-dom";
import LoadingSpinner  from "../components/LoadingSpinner/LoadingSpinner";

const Chats = ({ userId = null }) => {
  const { chats, addChats } = useChats(); // Accedemos al contexto
  const [loading, setLoading] = useState(true); // Estado de carga
  const [chatDetails, setChatDetails] = useState([]); // Detalles de los chats
  const navigate = useNavigate(); // Para redireccionar

  useEffect(() => {
    if (userId == null) {
      userId = getUserIdFromToken();
    }
    // Si el userId no está disponible, no hacemos nada
    if (!userId) {
      toast.error("No se pudo obtener el usuario.");
      setLoading(false);
      return;
    }

    const fetchChats = async () => {
      try {
        // Llamamos a listChats para cargar los chats del usuario y guardarlos en el contexto
        await listChats(userId, addChats);

        // Ahora que los chats están en el contexto, los asignamos a 'chatDetails' solo cuando estén listos
        if (chats.length > 0) {
          const detailsWithCars = chats.map((chat) => ({
            chatId: chat.chatId,
            seller: chat.seller || {},
            buyer: chat.buyer || {},
            car: chat.car || {},
            createdDate: chat.createdDate,
          }));

          setChatDetails(detailsWithCars); // Guardamos los detalles de los chats en el estado
        }
      } catch (error) {
        console.error("Error al obtener los chats:", error);
        toast.error("Hubo un error al obtener los chats.");
      } finally {
        setLoading(false); // Termina la carga
      }
    };

    fetchChats(); // Llamamos a la función para cargar los chats
  }, [addChats, chats]); // Dependencias para reejecutar el useEffect si cambian

  const handleChatClick = (chatDetailsItem) => {
    // Redirige a la página del chat
    navigate("/chat", {
      state: {
        userId: chatDetailsItem.seller?.id,
        carId: chatDetailsItem.car?.id,
        buyerId: chatDetailsItem.buyer?.id,
      },
    });
  };

  if (loading) {
    return (
      <div className="flex justify-center items-center">
        <LoadingSpinner /> {/* Usamos un spinner mientras se carga */}
      </div>
    );
  }

  return (
    <div class="bg-[#F5EFEB] min-h-screen p-5">
      <div className="max-w-3xl mx-auto p-4">
        <h2 className="text-2xl font-semibold text-center mb-6">Mis Chats</h2>
        {chatDetails.length === 0 ? (
          <p className="text-center text-gray-500">No tienes chats activos.</p>
        ) : (
          <ul className="space-y-4">
            {chatDetails.map((chatDetailsItem) => (
              <li
                key={chatDetailsItem.chatId}
                className="flex items-center space-x-4 p-4 bg-white border border-gray-200 rounded-lg shadow hover:shadow-lg transition-shadow cursor-pointer"
                onClick={() => handleChatClick(chatDetailsItem)}
              >
                {/* Imagen del coche o texto alternativo */}
                <div className="w-16 h-16 flex-shrink-0">
                  {chatDetailsItem.car?.images?.[0] ? (
                    <img
                      src={chatDetailsItem.car.images[0]}
                      alt="Car"
                      className="object-cover w-full h-full rounded-full"
                    />
                  ) : (
                    <div className="flex items-center justify-center bg-gray-200 rounded-full text-sm text-center text-gray-700">
                      {chatDetailsItem.car?.brand} {chatDetailsItem.car?.model}
                    </div>
                  )}
                </div>

                {/* Detalles del chat */}
                <div className="flex flex-col justify-between flex-grow">
                  <p className="text-sm font-semibold text-gray-800">
                    Vendedor: {chatDetailsItem.seller?.name || "Sin nombre"}
                  </p>
                  <p className="text-sm text-gray-500">
                    Comprador interesado:{" "}
                    {chatDetailsItem.buyer?.name || "Sin nombre"}
                  </p>
                  <p className="text-sm text-gray-700">
                    Marca/Modelo: {chatDetailsItem.car?.brand}{" "}
                    {chatDetailsItem.car?.model}
                  </p>
                  <p className="text-xs text-gray-400">
                    Fecha de creación:{" "}
                    {new Date(chatDetailsItem.createdDate).toLocaleString()}
                  </p>
                </div>
              </li>
            ))}
          </ul>
        )}
      </div>
    </div>
  );
};

export default Chats;
