# Usa la imagen oficial de Nginx
FROM nginx:alpine

# Copia el archivo de configuración de Nginx
COPY ./default.conf /etc/nginx/conf.d/default.conf

# Copia los archivos compilados de React a la carpeta pública de Nginx
COPY ./dist /usr/share/nginx/html/

# Exponer el puerto 80 para HTTP y 443 para HTTPS (si usas SSL)
EXPOSE 80
EXPOSE 443

# Establecer un comando para iniciar Nginx en primer plano
CMD ["nginx", "-g", "daemon off;"]
