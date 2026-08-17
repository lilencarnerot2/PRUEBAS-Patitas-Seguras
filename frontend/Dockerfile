# Usa la imagen oficial de PHP con Apache
FROM php:8.2-apache

# Directorio de trabajo
WORKDIR /var/www/html

# Copia todo el contenido del frontend al contenedor
COPY . /var/www/html/

# Da permisos a Apache para leer los archivos
RUN chown -R www-data:www-data /var/www/html

# Expone el puerto 80
EXPOSE 80

