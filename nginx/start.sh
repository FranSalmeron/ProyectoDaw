#!/bin/sh

PORT=${PORT:-8080}

# Reemplaza ${PORT} en el archivo de configuración Nginx con el valor real de la variable de entorno PORT
sed -i "s/\${PORT}/$PORT/g" /etc/nginx/conf.d/default.conf

echo "El puerto asignado es: $PORT"
# Inicia Nginx en primer plano
nginx -g 'daemon off;'
