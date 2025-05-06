FROM php:8.1-fpm

# Instalar dependencias del sistema necesarias
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libssl-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    libzip-dev \
    pkg-config \
    libcurl4-openssl-dev \
    libpq-dev \
    zlib1g-dev \
    libevent-dev \
    libidn11-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip curl

# Instalar Node.js 18
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# Instalar Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Establecer directorio de trabajo
WORKDIR /var/www/html
