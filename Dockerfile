FROM php:7.1-fpm-alpine

LABEL maintainer="Yoan Blanc <yoan@dosimple.ch>" \
      org.label-schema.vcs-url="https://github.com/HE-Arc/demo-laravel-application" \
      org.label-schema.schema-version="1.0"


# Python is required by node-sass
# xdebug is not enabled globally because it slows down composer.
RUN set -xe \
    && apk add --no-cache \
        acl \
        autoconf \
        curl \
        curl-dev \
        dpkg-dev \
        freetype \
        freetype-dev \
        g++ \
        gcc \
        git \
        icu-dev \
        imagemagick-dev \
        libc-dev \
        libjpeg-turbo \
        libjpeg-turbo-dev \
        libmcrypt \
        libmcrypt-dev \
        libpng \
        libpng-dev \
        libsodium-dev \
        libtool \
        make \
        mysql-dev \
        nodejs \
        pcre-dev \
        python
RUN set -xe \
    && docker-php-ext-configure intl --enable-intl
RUN set -xe \
     && docker-php-ext-install \
        curl \
        iconv \
        intl \
        json \
        exif \
        fileinfo \
        mcrypt \
        pcntl \
        pdo_mysql
RUN set -xe \
    && docker-php-ext-configure gd \
        --with-gd \
        --with-freetype-dir=/usr/include \
        --with-png-dir=/usr/include \
        --with-jpeg-dir=/usr/include
RUN set -xe \
    && docker-php-ext-install \
        gd
RUN set -xe \
    && pecl install \
        apcu \
        imagick \
        libsodium \
        redis \
        xdebug
RUN set -xe \
    && docker-php-ext-enable \
        apcu \
        imagick \
        sodium \
        redis
RUN set -xe \
    && apk del --no-cache \
        autoconf \
        curl-dev \
        dpkg-dev \
        freetype-dev \
        gcc \
        libjpeg-turbo-dev \
        libpng-dev \
        libc-dev \
        libtool \
        pcre-dev
RUN set -xe \
    && rm -rf /var/cache/apk/* \
    && \
        curl -sS https://getcomposer.org/installer | \
            php -- --install-dir=/usr/local/bin --filename=composer

# iconv hack.
RUN set -xe \
    && apk add --no-cache \
        --repository http://dl-cdn.alpinelinux.org/alpine/edge/testing \
        gnu-libiconv
ENV LD_PRELOAD /usr/lib/preloadable_libiconv.so php

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
