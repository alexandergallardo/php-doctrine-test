# Base image
FROM php:8.2-apache

ARG DEBIAN_FRONTEND=noninteractive

# Actualizar e instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libxml2-dev \
    libcurl4-openssl-dev \
    libonig-dev \
    libicu-dev \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd mysqli mbstring pdo bcmath intl xml curl pdo_mysql zip

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configurar Apache
COPY apache.conf /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite
RUN a2ensite 000-default

# Establecer directorio de trabajo
WORKDIR /var/www/html

# Copiar código fuente de la aplicación
COPY . /var/www/html

# Exponer el puerto
EXPOSE 8080