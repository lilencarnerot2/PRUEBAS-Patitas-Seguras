# Usa PHP 8.2 con Apache
FROM php:8.2-apache

# Instala la extension necesaria para conectarse a PostgreSQL
RUN apt-get update \
    && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql \
    && rm -rf /var/lib/apt/lists/*

# Directorio de trabajo
WORKDIR /var/www/html

# Copia el backend al contenedor
COPY . /var/www/html/

# Da permisos a Apache
RUN chown -R www-data:www-data /var/www/html

# Expone el puerto 80
EXPOSE 80