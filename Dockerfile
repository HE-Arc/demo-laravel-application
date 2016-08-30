FROM php:7.0-fpm-alpine
MAINTAINER Yoan Blanc <yoan@dosimple.ch>

RUN set -xe \
    && apk add --no-cache \
        acl \
        autoconf \
        curl \
        g++ \
        gcc \
        icu-dev \
        libc-dev \
        libtool \
        imagemagick-dev \
        make \
        # Memcached requires PHP >= 5.2,< 6.0
        #memcached-dev \
        mysql-dev \
        nodejs \
        postgresql-dev \
        # Required by node-sass
        python \
    # Native modules
    && docker-php-ext-install \
        intl \
        pdo_mysql \
        pdo_pgsql \
    # PECL modules
    && pecl install \
        apcu \
        imagick \
        #memcached \
        redis \
        xdebug \
    && docker-php-ext-enable \
        apcu \
        imagick \
        #memcached \
        redis \
        # Enabling xdebug makes composer slow.
        #xdebug \
    # NPM global packages
    && npm install -g \
        gulp \
        node-gyp \
    # Clean up
    && apk del \
        autoconf \
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
    && adduser -h /home/john -s /bin/sh -D john
COPY boot.sh /usr/local/bin/boot.sh
COPY profile.sh /etc/profile.d/docker.sh
RUN set -xe \
    && chmod +x /usr/local/bin/boot.sh

USER john
RUN ln -s /var/www/html /home/john/html

USER root
CMD [ "/usr/local/bin/boot.sh" ]
