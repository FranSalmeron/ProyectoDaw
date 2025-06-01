#!/bin/sh

PORT=${PORT:-8080}

# Reemplaza el puerto en la plantilla y copia al sitio real
sed "s/\${PORT}/$PORT/g" /default.conf.template > /etc/nginx/conf.d/default.conf

echo "✅ Puerto asignado por Railway: $PORT"
echo "✅ Archivo Nginx generado correctamente:"
cat /etc/nginx/conf.d/default.conf

# Inicia Nginx en primer plano
nginx -g 'daemon off;'
