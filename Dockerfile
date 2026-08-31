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

# Create cache directories BEFORE composer install
RUN mkdir -p /var/www/html/bootstrap/cache
RUN mkdir -p /var/www/html/storage
RUN mkdir -p /var/www/html/storage/logs
RUN mkdir -p /var/www/html/storage/framework
RUN mkdir -p /var/www/html/storage/framework/cache
RUN mkdir -p /var/www/html/storage/framework/sessions
RUN mkdir -p /var/www/html/storage/framework/views

# Set proper permissions BEFORE composer install
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 775 /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage

# Now install composer dependencies
RUN composer install --no-dev --optimize-autoloader

EXPOSE 8000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
