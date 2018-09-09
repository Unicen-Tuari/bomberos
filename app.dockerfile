FROM php:7.2.9-fpm

# Runtime

RUN apt-get update && apt-get install -y libmcrypt-dev \
    libpq-dev --no-install-recommends \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo_pgsql pgsql 

# Tools
# Git, Zip, Composer

RUN apt-get update \
    && apt-get install -y git unzip \
    && php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer \
    && apt-get -y autoremove \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*