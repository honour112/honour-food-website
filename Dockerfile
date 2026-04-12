FROM php:8.2-cli

WORKDIR /app

# Install system dependencies
RUN apt-get update && apt-get install -y \
    unzip git curl libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy project files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Fix permissions (VERY IMPORTANT on Render)
RUN chmod -R 775 storage bootstrap/cache

# ⚠️ OPTIONAL: only use if migrations are SAFE (no destructive changes)
# RUN php artisan migrate --force

# Start server (Render needs this port)
CMD php -S 0.0.0.0:10000 -t public