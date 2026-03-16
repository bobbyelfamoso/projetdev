FROM php:8.2-apache

RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Configurer Apache pour écouter sur le port 10000 (requis par Render)
RUN sed -i 's/80/10000/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf

# copier le contenu du dossier src dans la racine web
COPY ./src/ /var/www/html/

EXPOSE 10000

CMD ["apache2-foreground"]