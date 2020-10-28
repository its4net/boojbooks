FROM php:7.4.11-apache-buster

LABEL maintainer="Kris Scheppe <kris@scheppe.us>" \
      version="1.0"

COPY --chown=www-data:www-data . /srv/app

COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf 

WORKDIR /srv/app

RUN docker-php-ext-install mbstring pdo pdo_mysql \ 
    && a2enmod rewrite negotiation \
    && docker-php-ext-install opcache
