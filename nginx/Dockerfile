FROM nginx:alpine

# Copia config de Nginx
COPY ./default.conf /etc/nginx/conf.d/default.conf

# Copia el frontend compilado
COPY ./dist /usr/share/nginx/html/

# Exponer el puerto que Railway asigna dinámicamente (usando la variable de entorno $PORT)
EXPOSE 8080

# Lanza nginx en primer plano
CMD ["sh", "-c", "nginx -g 'daemon off;' -c /etc/nginx/nginx.conf"]
