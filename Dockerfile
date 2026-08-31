FROM php:8.2-fpm

# تحديث وتثبيت المتطلبات الأساسية
RUN apt-get update && apt-get install -y \
    curl \
    git \
    zip \
    unzip \
    libicu-dev \
    libzip-dev

# تثبيت PHP Extensions المحتاجة
RUN docker-php-ext-install \
    intl \
    zip \
    exif \
    pdo_mysql

# تثبيت Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# تحديد مجلد العمل
WORKDIR /app

# نسخ المشروع
COPY . .

# تثبيت Dependencies
RUN composer install --optimize-autoloader --no-scripts --no-interaction

# تشغيل Laravel
EXPOSE 8000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
