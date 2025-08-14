# ============================
# Stage 1 — Install PHP Dependencies
# ============================
FROM composer:2 as vendor
WORKDIR /app

# Copy composer files
COPY composer.json composer.lock ./

# Copy full application source for autoload resolution
COPY . .

# Install dependencies (no dev for production)
RUN composer install \
    --no-dev \
    --optimize-autoloader \
    --no-interaction

# ============================
# Stage 2 — Final PHP-FPM Image
# ============================
FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git unzip libpng-dev libonig-dev libxml2-dev zip libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring bcmath gd exif pcntl zip

# Set working directory
WORKDIR /var/www

# Copy application source
COPY . .

# Copy vendor folder from build stage
COPY --from=vendor /app/vendor ./vendor

# Ensure storage & bootstrap/cache are writable
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]
