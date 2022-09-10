FROM php:8.1-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y git curl libpq-dev libzip-dev libpng-dev libonig-dev libxml2-dev zip unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Install PHP extensions
RUN docker-php-ext-install mbstring exif pcntl bcmath gd opcache intl pdo pdo_pgsql pgsql
RUN docker-php-ext-enable pdo_pgsql sodium
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www
