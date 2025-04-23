import React, { useEffect, useState } from "react";
import { getUsers, toggleAdmin, toggleBanned } from "../helpers/userHelper";
import { useNavigate } from "react-router-dom";
import { toast } from "react-toastify";
import { isAdmin } from "../helpers/decodeToken";
import LoadingSpinner from "../components/LoadingSpinner/LoadingSpinner";

const Users = () => {
  const [users, setUsers] = useState([]);
  const [loading, setLoading] = useState(true); // Estado de carga
  const navigate = useNavigate();

  useEffect(() => {
    if (!isAdmin()) {
      toast.error("Acceso no autorizado");
      navigate("/");
      return;
    }

    const fetchUsers = async () => {
      try {
        const allUsers = await getUsers();
        setUsers(allUsers.users);
        setLoading(false); // Detener la carga después de obtener los usuarios
      } catch (error) {
        toast.error("Error al cargar usuarios");
        setLoading(false); // Detener la carga en caso de error
      }
    };

    fetchUsers();
  }, []);

  const handleToggleAdmin = async (userId, currentRoles) => {
    try {
      const newRoles = currentRoles.includes("ROLE_ADMIN")
        ? currentRoles.filter((role) => role !== "ROLE_ADMIN")
        : [...currentRoles, "ROLE_ADMIN"];

      await toggleAdmin(userId, newRoles);
      toast.success("Rol admin actualizado");
      setUsers((prev) =>
        prev.map((u) => (u.id === userId ? { ...u, roles: newRoles } : u))
      );
    } catch (error) {
      toast.error("Error al cambiar rol admin");
    }
  };

  const handleToggleBanned = async (userId, currentRoles) => {
    try {
      const newRoles = currentRoles.includes("ROLE_BANNED")
        ? currentRoles.filter((role) => role !== "ROLE_BANNED")
        : [...currentRoles, "ROLE_BANNED"];

      await toggleBanned(userId, newRoles);
      toast.success("Estado de baneo actualizado");
      setUsers((prev) =>
        prev.map((u) => (u.id === userId ? { ...u, roles: newRoles } : u))
      );
    } catch (error) {
      toast.error("Error al cambiar estado de baneo");
    }
  };

  return (
    <div className="bg-[#F5EFEB] min-h-screen">
      <div className="p-6 max-w-7xl mx-auto">
        <h1 className="text-3xl font-bold mb-6">Panel de Usuarios</h1>

        {/* Mostrar el spinner mientras cargan los usuarios */}
        {loading ? (
          <div className="flex justify-center items-center h-screen">
            <LoadingSpinner /> {/* Componente de carga */}
          </div>
        ) : (
          <div className="overflow-x-auto">
            <table className="min-w-full bg-white border border-gray-300 rounded-md shadow-md">
              <thead>
                <tr className="bg-gray-100 text-left">
                  <th className="py-3 px-4">ID</th>
                  <th className="py-3 px-4">Nombre</th>
                  <th className="py-3 px-4">Email</th>
                  <th className="py-3 px-4">Dirección</th>
                  <th className="py-3 px-4">Rol</th>
                  <th className="py-3 px-4">Estado</th>
                  <th className="py-3 px-4 text-center">Acciones</th>
                </tr>
              </thead>
              <tbody>
                {users.map((user) => {
                  const isAdminRole = user.roles?.includes("ROLE_ADMIN");
                  const isBanned = user.roles?.includes("ROLE_BANNED");

                  return (
                    <tr key={user.id} className="border-t border-gray-200">
                      <td className="py-2 px-4">{user.id}</td>
                      <td className="py-2 px-4">{user.name}</td>
                      <td className="py-2 px-4">{user.email}</td>
                      <td className="py-2 px-4">{user.address}</td>
                      <td className="py-2 px-4">
                        {isAdminRole ? "Admin" : "Usuario"}
                      </td>
                      <td className="py-2 px-4">
                        {isBanned ? "Baneado" : "Activo"}
                      </td>
                      <td className="py-2 px-4 flex flex-col md:flex-row gap-2 justify-center">
                        {/* Botón de "Hacer/ Quitar Admin" */}
                        {!isAdminRole && (
                          <button
                            className="px-4 py-1 rounded text-white bg-green-500 hover:bg-green-600"
                            onClick={() => handleToggleAdmin(user.id, user.roles)}
                          >
                            Hacer Admin
                          </button>
                        )}
                        {isAdminRole && (
                          <button
                            className="px-4 py-1 rounded text-white bg-yellow-500 hover:bg-yellow-600"
                            onClick={() => handleToggleAdmin(user.id, user.roles)}
                          >
                            Quitar Admin
                          </button>
                        )}

                        {/* Botón de "Banear/ Desbanear" */}
                        {!isBanned && (
                          <button
                            className="px-4 py-1 rounded text-white bg-red-500 hover:bg-red-600"
                            onClick={() =>
                              handleToggleBanned(user.id, user.roles)
                            }
                          >
                            Banear
                          </button>
                        )}
                        {isBanned && (
                          <button
                            className="px-4 py-1 rounded text-white bg-blue-500 hover:bg-blue-600"
                            onClick={() =>
                              handleToggleBanned(user.id, user.roles)
                            }
                          >
                            Desbanear
                          </button>
                        )}
                      </td>
                    </tr>
                  );
                })}
              </tbody>
            </table>
          </div>
        )}
      </div>
    </div>
  );
};

export default Users;
