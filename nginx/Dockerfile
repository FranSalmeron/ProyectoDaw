FROM nginx:alpine

# Copia config de Nginx
COPY ./default.conf /etc/nginx/conf.d/default.conf

# Copia el frontend compilado
COPY ./dist /usr/share/nginx/html/

# Solo expón el puerto que Railway usará
EXPOSE 8080

# Lanza nginx en primer plano
CMD ["nginx", "-g", "daemon off;"]
