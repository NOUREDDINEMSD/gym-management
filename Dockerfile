FROM php:8.2-cli

WORKDIR /var/www

# Install system dependencies + Node.js
RUN apt-get update && apt-get install -y \
    git curl zip unzip libzip-dev nodejs npm

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy project
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Install Node dependencies + build assets
RUN npm install
RUN npm run build

# Laravel setup
RUN php artisan config:clear
RUN php artisan migrate --force || true

# Permissions
RUN chmod -R 777 storage bootstrap/cache

EXPOSE 10000

CMD php artisan serve --host=0.0.0.0 --port=10000