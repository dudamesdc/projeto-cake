# Use a imagem oficial do PHP com Apache
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

# Instale extensões PHP necessárias para o CakePHP 2.10.24
RUN docker-php-ext-install gettext intl pdo pdo_pgsql mbstring 

# Ativar mod_rewrite para o Apache
RUN a2enmod rewrite

# Configurar o Apache para o CakePHP
COPY apache-cakephp.conf /etc/apache2/sites-available/cakephp.conf
RUN a2ensite cakephp.conf




# Não reiniciar o Apache aqui; faça isso no momento da execução

## Copiar o código do CakePHP para o diretório de trabalho no contêiner
COPY meu-cake /var/www/html

# Definir as permissões adequadas para o CakePHP
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 775 /var/www/html/app/tmp
