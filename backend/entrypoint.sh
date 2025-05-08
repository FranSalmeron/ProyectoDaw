#!/bin/bash

# Usa el puerto de Railway o por defecto el 8081
PORT=${PORT:-8080}

# Actualiza VirtualHost para Apache
sed -i "s/<VirtualHost \*:80>/<VirtualHost *:${PORT}>/" /etc/apache2/sites-available/000-default.conf

echo "El puerto asignado para Apache es: $PORT"

# Ejecuta migraciones si es necesario
php bin/console doctrine:schema:update --complete --force

# Ejecuta el servidor WebSocket en segundo plano (puerto 8080)
php bin/webSocket.php &

# Inicia Apache en primer plano
exec apache2-foreground
