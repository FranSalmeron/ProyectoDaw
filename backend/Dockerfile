FROM fransalmeron/proyectodaw-backend:latest

# Instalación de dependencias
RUN apt-get update && apt-get install -y \
    libzip-dev unzip git \
    libpng-dev libjpeg62-turbo-dev libfreetype6-dev \
    libicu-dev libpq-dev \
    && docker-php-ext-configure zip \
    && docker-php-ext-install pdo pdo_mysql zip intl gd opcache

# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Symfony CLI
RUN curl -sS https://get.symfony.com/cli/installer | bash
RUN mv /root/.symfony*/bin/symfony /usr/local/bin/symfony

# Copiar configuración personalizada
COPY ./apache/000-default.conf /etc/apache2/sites-available/000-default.conf
COPY ./php.ini /usr/local/etc/php/conf.d/custom.ini

# Activar módulos necesarios de Apache
RUN a2enmod rewrite headers
RUN a2dissite 000-default.conf && a2ensite 000-default.conf


# Adaptar Apache al puerto que Railway asigna
# ARG PORT
# ENV PORT=${PORT}
# RUN sed -i "s/80/${PORT}/g" /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf
# EXPOSE ${PORT}

# Establecer directorio de trabajo y copiar el código
WORKDIR /var/www/html
COPY . /var/www/html

# Ajustar permisos (crítico para prod)
RUN chown -R www-data:www-data /var/www/html



# Preparar Symfony para producción
# RUN composer install --no-dev --optimize-autoloader
# RUN php bin/console cache:clear --env=prod
# RUN php bin/console cache:warmup --env=prod

ENV PORT=${PORT}

# Copia el script de arranque
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# Exponer el puerto 8081 (puerto de webSocket)
# EXPOSE 8081

# Usar el script como entrypoint
ENTRYPOINT ["/entrypoint.sh"]