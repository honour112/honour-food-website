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

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Fix Laravel permissions (VERY IMPORTANT on Render)
RUN chmod -R 775 storage bootstrap/cache

# 🔥 Clear and rebuild Laravel cache (FIXES YOUR ISSUE)
RUN php artisan config:clear || true
RUN php artisan cache:clear || true
RUN php artisan route:clear || true
RUN php artisan view:clear || true

# Rebuild cache cleanly
RUN php artisan config:cache || true
RUN php artisan route:cache || true

# ⚠️ Do NOT run migrate here (Render build phase issue)

# Expose port (Render uses 10000)
EXPOSE 10000

# Start Laravel server
CMD php -S 0.0.0.0:10000 -t public