FROM php:8.2-fpm

# update packeges
ENV COMPOSER_ALLOW_SUPERUSER=1

WORKDIR /app

RUN apt-get update && apt-get upgrade -y

# Установите необходимые инструменты
RUN apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo_mysql \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

COPY ../../backend .

RUN mkdir -p docker/php/conf.d \
    touch docker/php/conf.d/xdebug.ini \
    touch docker/php/conf.d/error_reporting.ini

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install && ls -a

RUN composer install

CMD ["php-fpm"]
