FROM php:7.1.7-fpm

# Runtime

RUN apt-get update && apt-get install -y libmcrypt-dev \
    libpq-dev --no-install-recommends \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install mcrypt pdo_pgsql pgsql 

# Tools
# Git, Zip, Composer

RUN docker-php-ext-install zip \ 
    && apt-get update \
    && apt-get install -y git zip unzip \
    && php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer \
    && apt-get -y autoremove \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*