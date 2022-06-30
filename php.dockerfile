FROM php:8.1-fpm

RUN mkdir -p /var/www/html

RUN docker-php-ext-install pdo pdo_mysql