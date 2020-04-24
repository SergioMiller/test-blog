#
#--------------------------------------------------------------------------
# Image Setup
#--------------------------------------------------------------------------
#

FROM php:7.3-fpm

#
#--------------------------------------------------------------------------
# Software's Installation
#--------------------------------------------------------------------------
#

RUN apt-get update -y
RUN apt-get -y install gcc make autoconf libc-dev pkg-config libzip-dev

RUN apt-get install -y --no-install-recommends \
        curl libcurl4-openssl-dev \
#        geoip-bin \
#        geoip-database \
#        libgeoip-dev \
        git \
#        libmemcached-dev \
#        libz-dev \
#        libpq-dev \
#        libfreetype6-dev \
#        libssl-dev \
#        libmagickwand-dev \
#        openssl \
        libxml2-dev \
        mariadb-client

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#
#--------------------------------------------------------------------------
# Install the PHP extentions
#--------------------------------------------------------------------------
#

RUN docker-php-ext-configure soap --enable-soap \
  && docker-php-ext-install \
#    pdo_pgsql \
#    exif \
#    iconv \
#    mbstring \
#    mysqli \
#    phar \
#    posix \
#    soap \
#    tokenizer \
     zip \
#    gd \
    pdo_mysql

#
#--------------------------------------------------------------------------
# Install PHP extentions by pecl
#--------------------------------------------------------------------------
#
#RUN pecl install redis memcached mongodb msgpack imagick mcrypt-1.0.1 && \
#    docker-php-ext-enable redis memcached mongodb msgpack imagick mcrypt

#
#--------------------------------------------------------------------------
# Install mcrypt extention, required for base laravel app
#--------------------------------------------------------------------------
#
#RUN pecl install mcrypt-1.0.1 && \
#    docker-php-ext-enable mcrypt

#RUN pecl install http://pecl.php.net/get/geoip-1.1.1.tgz && \
#    docker-php-ext-enable geoip

COPY config/php.ini /usr/local/etc/php/php.ini

USER root

EXPOSE 9000

CMD ["php-fpm"]
