#!/bin/bash

# Usa el puerto de Railway o default al 8080
PORT=${PORT:-8080}

# Solo modifica VirtualHost, no uses "Listen" (Railway gestiona eso internamente)
sed -i "s/<VirtualHost \*:80>/<VirtualHost *:${PORT}>/" /etc/apache2/sites-available/000-default.conf

redis-server --daemonize yes

# Ejecuta migraciones (opcional, solo si quieres que se lancen al iniciar)
php bin/console doctrine:migrations:migrate --no-interaction

# Iniciar Apache
exec apache2-foreground
