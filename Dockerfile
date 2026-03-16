FROM php:8.2-apache

RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# copier le contenu du dossier src dans la racine web
COPY ./src/ /var/www/html/

EXPOSE 10000

CMD ["apache2-foreground"]