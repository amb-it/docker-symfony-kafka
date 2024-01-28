FROM php:8.2-fpm-alpine

RUN apk update && apk add  --no-cache \
    git \
    mysql-client \
    curl \
    mc \
    libzip-dev \
    libmcrypt \
    libmcrypt-dev \
    libxml2-dev \
    freetype \
    freetype-dev \
    librdkafka-dev \
    libpng \
    libpng-dev \
    libjpeg-turbo \
    libjpeg-turbo-dev g++ make autoconf

RUN docker-php-ext-install zip pdo_mysql \
    && pecl install rdkafka \
    && docker-php-ext-enable rdkafka

RUN apk add bash

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer

WORKDIR /var/www

CMD ["php-fpm"]

EXPOSE 9000