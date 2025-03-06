FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    wget \
    libzip-dev

RUN apt-get update \
    && docker-php-ext-install pdo pdo_mysql zip
    
RUN apt-get -y update
RUN apt-get -y install git
    
RUN apt-get update && apt-get install -y unzip \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN wget https://getcomposer.org/installer -O - -q | php -- --install-dir=/bin --filename=composer --quiet

RUN useradd -d /home/develop -m -s /bin/bash develop && echo "develop:develop" | chpasswd && adduser develop sudo

WORKDIR /project

RUN chown -R develop:develop /project
USER develop
