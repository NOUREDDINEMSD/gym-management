FROM php:8.2-cli

WORKDIR /var/www

# System dependencies + Node
RUN apt-get update && apt-get install -y \
    git curl zip unzip libzip-dev nodejs npm

# PHP extensions
RUN docker-php-ext-install pdo pdo_mysql zip

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy project
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Install Node + build assets (THIS WAS MISSING)
RUN npm install
RUN npm run build

# IMPORTANT: remove old cache that causes HTTP issues
RUN rm -rf bootstrap/cache/*.php

# Laravel optimization (correct order)
RUN php artisan optimize:clear || true
RUN php artisan config:cache
RUN php artisan route:cache || true

# Permissions
RUN chmod -R 777 storage bootstrap/cache

EXPOSE 10000

CMD php artisan serve --host=0.0.0.0 --port=10000