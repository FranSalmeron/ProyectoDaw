#!/bin/sh

# Esperar a que el servidor esté listo
echo "Esperando el backend..."

# Aquí deberías poner la lógica para esperar que la base de datos esté lista, por ejemplo:
while ! nc -z backend 8001; do
  echo "Esperando a que el backend esté listo..."
  sleep 1
done

# Ahora puedes iniciar la aplicación frontend
echo "¡Backend listo! Iniciando frontend..."
npm start
