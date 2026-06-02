FROM php:8.2-cli

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    git curl zip unzip libzip-dev libpq-dev nodejs npm \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql zip \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . .

RUN composer install --no-dev --optimize-autoloader --no-interaction

RUN npm ci --include=dev && npm run build

RUN chmod -R 775 storage bootstrap/cache \
    && chmod +x docker/start.sh

EXPOSE 10000

CMD ["bash", "docker/start.sh"]
