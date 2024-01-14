FROM php:8.2.4-fpm

# Instala las dependencias necesarias, incluyendo Composer
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    nano \
    && docker-php-ext-install zip pdo_mysql

# Instala Composer globalmente
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Establece el directorio de trabajo en el contenedor
WORKDIR /var/www/html

# Copia los archivos del proyecto al contenedor
COPY . .

# Instala las dependencias de Composer (si tienes un archivo composer.lock)
RUN composer install --no-interaction --no-progress --no-suggest

# Exponer el puerto que utiliza Laravel por defecto
EXPOSE 8000

# Comando para ejecutar la aplicación Laravel
CMD php artisan serve --host=0.0.0.0 --port=8000