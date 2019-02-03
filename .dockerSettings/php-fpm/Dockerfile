FROM php:7.0.8-fpm

######
# You can install php extensions using docker-php-ext-install
######

RUN apt-get update \
    && apt-get install -y \
        libfreetype6-dev \
        libmagickwand-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
        jpegoptim \
        optipng \
        gifsicle \
        sendmail \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install -j$(nproc) zip \
    && docker-php-ext-install mbstring \
    && docker-php-ext-install gettext \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install pcntl \
    && pecl install xdebug-2.6.0beta1 \
        imagick \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-enable imagick

RUN pecl install redis && docker-php-ext-enable redis