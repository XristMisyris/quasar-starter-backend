FROM php:7.0-fpm

# Install Debian packages and PHP extensions
RUN docker-php-ext-install -j$(nproc) pdo_mysql

WORKDIR /app
