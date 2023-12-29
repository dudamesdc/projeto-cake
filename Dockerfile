
FROM php:7.2-apache

WORKDIR /var/www/html

RUN apt-get update -y && apt-get install -y libicu-dev unzip zip gettext
RUN apt-get update && \
    apt-get install -y \
    libicu-dev \
    libpq-dev \
    gettext \
    unzip \
    zip \
    postgresql-client


RUN docker-php-ext-install gettext intl pdo pdo_pgsql mbstring 


RUN a2enmod rewrite


COPY apache-cakephp.conf /etc/apache2/sites-available/cakephp.conf
RUN a2ensite cakephp.conf





COPY meu-cake /var/www/html


RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 775 /var/www/html/app/tmp
