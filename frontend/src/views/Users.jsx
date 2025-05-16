import React, { useEffect, useState } from "react";
import { getUsers, toggleAdmin, toggleBanned } from "../helpers/userHelper";
import { useNavigate } from "react-router-dom";
import { toast } from "react-toastify";
import { isAdmin } from "../helpers/decodeToken";
import LoadingSpinner from "../components/LoadingSpinner/LoadingSpinner";
import { useDarkMode } from "../context/DarkModeContext";

const Users = () => {
  const [users, setUsers] = useState([]);
  const [loading, setLoading] = useState(true);
  const navigate = useNavigate();
  const { isDarkMode } = useDarkMode();

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
        setLoading(false);
      } catch (error) {
        toast.error("Error al cargar usuarios");
        setLoading(false);
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

  // Modo oscuro
  const bgMain = isDarkMode ? "bg-[#1C1C1E] text-white" : "bg-[#F5EFEB] text-black";
  const tableBg = isDarkMode ? "bg-[#2C2C2E]" : "bg-white";
  const theadBg = isDarkMode ? "bg-[#3A3A3C]" : "bg-gray-100";
  const borderColor = isDarkMode ? "border-gray-600" : "border-gray-300";

  return (
    <div className={`${bgMain} min-h-screen transition-colors duration-300`}>
      <div className="p-6 max-w-7xl mx-auto">
        <h1 className="text-3xl font-bold mb-6">Panel de Usuarios</h1>

        {loading ? (
          <div className="flex justify-center items-center h-screen">
            <LoadingSpinner />
          </div>
        ) : (
          <div className="overflow-x-auto">
            <table className={`min-w-full ${tableBg} border ${borderColor} rounded-md shadow-md`}>
              <thead>
                <tr className={`${theadBg} text-left`}>
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
                    <tr key={user.id} className={`border-t ${borderColor}`}>
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

                        {!isBanned && (
                          <button
                            className="px-4 py-1 rounded text-white bg-red-500 hover:bg-red-600"
                            onClick={() => handleToggleBanned(user.id, user.roles)}
                          >
                            Banear
                          </button>
                        )}
                        {isBanned && (
                          <button
                            className="px-4 py-1 rounded text-white bg-blue-500 hover:bg-blue-600"
                            onClick={() => handleToggleBanned(user.id, user.roles)}
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