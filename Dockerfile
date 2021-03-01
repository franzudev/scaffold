# Build backend source
FROM composer:2.0.7 as backend
MAINTAINER Federico François (fede.franzu@gmail.com)
WORKDIR /app
COPY . /app/
COPY .env.portainer /app/.env
COPY composer.json /app/
RUN composer install
RUN composer dump-autoload

# Build frontend assets
FROM node:12-alpine as frontend
WORKDIR /app
COPY .env.portainer /app/.env
COPY package.json package-lock.json tsconfig.json webpack.config.js webpack.mix.js /app/
RUN npm install
COPY resources/ /app/resources/
RUN npm run dev

# Build app image
FROM php:7.3-apache as app
LABEL maintainer="Joel Shepherd <https://github.com/joelshepherd>"
RUN apt-get update && apt-get install -y libpng-dev
RUN apt-get install -y \
    libwebp-dev \
    libjpeg62-turbo-dev \
    libpng-dev libxpm-dev \
    libfreetype6-dev \
    nano

RUN docker-php-ext-configure gd \
    --with-gd \
    --with-webp-dir \
    --with-jpeg-dir \
    --with-png-dir \
    --with-zlib-dir \
    --with-xpm-dir \
    --with-freetype-dir

RUN docker-php-ext-install \
    mbstring \
    opcache \
    gd \
    pdo_mysql
RUN pecl install -o -f redis \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable redis

RUN a2enmod rewrite

ADD .docker/apache.conf /etc/apache2/sites-available/000-default.conf
ADD .docker/php.ini ${PHP_INI_DIR}/conf.d/99-overrides.ini

WORKDIR /app
COPY --from=backend /app /app
COPY --from=frontend /app/public /app/public

RUN php artisan key:generate
RUN php artisan storage:link
RUN php artisan cache:clear
RUN chgrp -R www-data /app/storage /app/bootstrap/cache
RUN chmod -R ug+rwx /app/storage /app/bootstrap/cache
