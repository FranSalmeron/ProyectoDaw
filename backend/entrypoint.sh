#!/bin/bash
# Esperar a que la base de datos esté lista
echo "Esperando a que la base de datos esté lista..."
until nc -z -v -w30 database 3306
do
  echo "Esperando la base de datos..."
  sleep 1
done
echo "Base de datos disponible."

# Ahora ejecutar el servidor Symfony
echo "Iniciando el servidor Symfony..."
symfony server:start --no-tls --daemon

# Si quieres que Symfony corra en modo 'dev', puedes agregar: symfony server:start --no-tls --daemon
# o ejecutarlo en modo "prod" si es necesario.
