FROM php:7.1-cli
RUN mkdir /app
WORKDIR /app
VOLUME /app

RUN \
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
php composer-setup.php --install-dir=/usr/bin --filename=composer && \
php -r "unlink('composer-setup.php');"

RUN apt-get update && apt-get install -y git zip