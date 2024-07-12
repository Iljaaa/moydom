FROM php:8.3-fpm

RUN apt-get update

# php-mysql
RUN docker-php-ext-install pdo pdo_mysql mysqli

# xdebug
RUN pecl install xdebug-3.3.2 \
    && docker-php-ext-enable xdebug

ADD ./php.ini /usr/local/etc/php/php.ini

WORKDIR /var/www
