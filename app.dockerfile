FROM php:7.1.7-fpm

RUN apt-get update && apt-get install -y libmcrypt-dev \
libpq-dev libmagickwand-dev --no-install-recommends \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install mcrypt pdo_pgsql pgsql\
