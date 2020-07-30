##################################
#   Install dependencies to php and add node
##################################
FROM php:7.4.8-fpm-alpine
RUN apk add -Uuv --update \
    git openssl unzip libmcrypt-dev libxml2-dev libzip-dev mysql-client \
    oniguruma-dev libjpeg-turbo-dev libpng-dev freetype-dev $PHPIZE_DEPS \
    nodejs npm \
    && rm -rf /var/cache/apk/*

RUN pecl install mcrypt-1.0.3
RUN docker-php-ext-enable mcrypt
RUN docker-php-ext-install gd tokenizer xml pdo mbstring pdo_mysql soap zip
RUN docker-php-ext-configure soap --enable-soap

WORKDIR /var/www/laravel

EXPOSE 9000