FROM php:8.2-fpm

RUN apt-get -y update && apt-get upgrade -y

RUN docker-php-ext-install pdo pdo_mysql \
    && docker-php-ext-enable pdo_mysql
    
RUN apt-get update \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN useradd -d /home/develop -m -s /bin/bash develop && echo "develop:develop" | chpasswd && adduser develop sudo

WORKDIR /project

RUN chown -R develop:develop /project
USER develop

ADD docker-php-ext-xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

CMD ["php-fpm"]
