FROM php:8.0-apache

USER root

WORKDIR /var/www/html

RUN apt-get update
RUN apt-get install -y \
        libpng-dev \
        libpq-dev \
        zlib1g-dev \
        libxml2-dev \
        libzip-dev \
        libonig-dev \
        zip \
        curl \
        unzip \
    && docker-php-ext-configure gd \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo \
    && docker-php-ext-install pdo_pgsql \
    && docker-php-ext-install pgsql \
    && docker-php-ext-install mbstring \
    && docker-php-ext-install dom \
    && docker-php-ext-install xml \
    && docker-php-ext-install zip \
    && docker-php-source delete

RUN curl -sL https://deb.nodesource.com/setup_12.x | bash - && \
        apt-get install -y --no-install-recommends nodejs

RUN echo "America/Sao_Paulo" > /etc/timezone; \
    rm -f /etc/apache2/sites-enabled/000-default.conf

ADD ./docker/apache.conf /etc/apache2/sites-available/000-default.conf
#ADD php.ini /usr/local/etc/php/php.ini

# Remove cache and logs if some and fixes permissions
RUN rm -rf /var/cache/* && rm -rf /var/logs/* && rm -rf /var/sessions/*
RUN rm -f /var/run/apache2/apache2.pid

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ADD . /var/www/html
COPY .env.hml /var/www/html/.env
RUN rm -f /var/www/html/composer.lock
RUN rm -f /var/www/html/storage/logs/laravel.log
RUN rm -rf /var/www/html/vendor

RUN composer require laravel/ui --dev
RUN composer install

RUN php artisan key:generate
RUN php artisan migrate

RUN chmod a+rw /var/www/html/storage -R
RUN chmod a+r /var/run/apache2 -R

RUN npm install
RUN npm install resolve-url-loader@^3.1.2 --save-dev --legacy-peer-deps
RUN npm run dev

RUN a2enmod rewrite