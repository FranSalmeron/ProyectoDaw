FROM php:8.1-apache

# 1. Dependencias necesarias
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    git \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libicu-dev \
    libpq-dev \
    && docker-php-ext-configure zip \
    && docker-php-ext-install pdo pdo_mysql zip intl gd opcache

# 2. Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# 3. Redis (solo cliente PHP, no el servidor)
RUN pecl install redis && docker-php-ext-enable redis

# 4. Habilitar módulos Apache
RUN a2enmod rewrite headers

# 5. Usar el puerto proporcionado por Railway
ENV PORT 8080
EXPOSE 8080
RUN sed -i "s/80/\${PORT}/g" /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf

# 6. Configuración PHP
COPY ./php.ini /usr/local/etc/php/conf.d/custom.ini

# 7. Código fuente
WORKDIR /var/www/html
COPY . /var/www/html

# NO ejecutar estos comandos durante el build
# RUN composer install --no-dev --optimize-autoloader \
#     && php bin/console cache:clear --env=prod \
#     && php bin/console cache:warmup --env=prod

# Comando final para ejecutar el contenedor
CMD ["apache2-foreground"]
