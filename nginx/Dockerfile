FROM nginx:alpine

# Copia config de Nginx
COPY ./default.conf /etc/nginx/conf.d/default.conf

# Copia el frontend compilado
COPY ./dist /usr/share/nginx/html/

# Copia el script de inicio para reemplazar el puerto
COPY ./start.sh /start.sh

# Asegúrate de que el script sea ejecutable
RUN chmod +x /start.sh
RUN chmod -R 755 /usr/share/nginx/html


# Expón el puerto 8081, ya que Railway asigna uno dinámicamente
EXPOSE 8080

# Ejecuta el script que ajusta la configuración y lanza Nginx
CMD ["/start.sh"]
