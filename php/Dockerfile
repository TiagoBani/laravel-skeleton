##################################
#   Install dependencies to php
##################################
FROM php:7.3-fpm-alpine
RUN apk add -Uuv \
    git openssl unzip libmcrypt-dev libxml2-dev libzip-dev mysql-client \
    libjpeg-turbo-dev libpng-dev freetype-dev $PHPIZE_DEPS \
    && rm -rf /var/cache/apk/*

RUN pecl install mcrypt-1.0.2
RUN docker-php-ext-enable mcrypt
RUN docker-php-ext-install gd tokenizer xml pdo mbstring pdo_mysql soap zip
RUN docker-php-ext-configure soap --enable-soap

WORKDIR /var/www/laravel