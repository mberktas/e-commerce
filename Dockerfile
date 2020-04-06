FROM php:7.2-fpm-alpine
COPY ./src/ /var/www/html
WORKDIR /var/www/html

RUN docker-php-ext-install pdo pdo_mysql