#!/bin/bash

# Usa el puerto de Railway o default al 8080
PORT=${PORT:-8081}

# Solo modifica VirtualHost, no uses "Listen" (Railway gestiona eso internamente)
sed -i "s/<VirtualHost \*:80>/<VirtualHost *:${PORT}>/" /etc/apache2/sites-available/000-default.conf

redis-server --daemonize yes

# Ejecuta la actualizacion de la BD (opcional, solo si quieres que se lancen al iniciar)
php bin/console doctrine:schema:update --complete --force

# Iniciar Apache
exec apache2-foreground
