# ---------- Node / Vite build ----------
FROM node:22-alpine AS frontend

WORKDIR /app

COPY package*.json ./
RUN npm ci

COPY . .
RUN npm run build


# ---------- PHP / Laravel ----------
FROM php:8.4-fpm

WORKDIR /var/www/html

# Install dependencies
RUN apt-get update && apt-get install -y \
    curl \
    git \
    zip \
    unzip \
    libicu-dev \
    libzip-dev \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install \
    intl \
    zip \
    exif \
    pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy project files
COPY . .

# Copy Vite production build
COPY --from=frontend /app/public/build ./public/build

# Create required directories
RUN mkdir -p \
    bootstrap/cache \
    storage/logs \
    storage/framework/cache \
    storage/framework/sessions \
    storage/framework/views

# Set permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 bootstrap/cache storage

# Install Composer dependencies
RUN composer install --no-dev --optimize-autoloader

EXPOSE 8000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
