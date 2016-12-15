FROM php:7.1-fpm-alpine
MAINTAINER Yoan Blanc <yoan@dosimple.ch>

RUN set -xe \
    && apk add --no-cache \
        acl \
        autoconf \
        curl \
        curl-dev \
        g++ \
        gcc \
        git \
        icu-dev \
        libc-dev \
        libtool \
        libsodium-dev \
        imagemagick-dev \
        make \
        mysql-dev \
        nodejs \
        postgresql-dev \
        # Require by node-sass
        python \
    # Native modules
    && docker-php-ext-install \
        curl \
        intl \
        json \
        exif \
        fileinfo \
        pcntl \
        pdo_mysql \
        pdo_pgsql \
    # PECL modules
    && pecl install \
        apcu \
        imagick \
        libsodium \
        redis \
        xdebug \
    && docker-php-ext-enable \
        apcu \
        imagick \
        libsodium \
        redis \
        # Enabling xdebug makes composer slow.
        #xdebug \
    # Clean up
    && apk del \
        autoconf \
        curl-dev \
        gcc \
        libc-dev \
        libtool \
    && rm -rf /var/cache/apk/* \
    # Composer
    && \
        curl -sS https://getcomposer.org/installer | \
            php -- --install-dir=/usr/local/bin --filename=composer

# PHP configuration

# User stuff.
RUN set -x \
    && adduser -h /home/laravel -s /bin/sh -D laravel
COPY boot.sh /usr/local/bin/boot.sh
COPY profile.sh /etc/profile.d/docker.sh
RUN set -xe \
    && chmod +x /usr/local/bin/boot.sh

USER laravel
RUN ln -s /var/www/html /home/laravel/html

USER root
CMD [ "/usr/local/bin/boot.sh" ]
