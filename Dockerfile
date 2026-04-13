FROM php:8.2-cli

WORKDIR /app

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl unzip libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy project files
COPY . .

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# Fix Laravel permissions (VERY IMPORTANT on Render)
RUN chmod -R 775 storage bootstrap/cache

# Optimize Laravel
RUN php artisan config:cache || true
RUN php artisan route:cache || true

# ⚠️ DO NOT run migrate here (can break builds on Render)

# Start server (Render needs this port)
CMD php -S 0.0.0.0:10000 -t public