FROM php:8.4-fpm


WORKDIR /var/www/html

# تثبيت الـ dependencies
RUN apt-get update && apt-get install -y \
    curl \
    git \
    zip \
    unzip \
    libicu-dev \
    libzip-dev \
    && rm -rf /var/lib/apt/lists/*

# تثبيت PHP extensions
RUN docker-php-ext-install \
    intl \
    zip \
    exif \
    pdo_mysql

# نسخ Composer من صورة رسمية
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# نسخ المشروع
COPY . .

# تثبيت Composer dependencies
RUN composer install --optimize-autoloader --no-scripts --no-interaction

# تشغيل Laravel
EXPOSE 8000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
