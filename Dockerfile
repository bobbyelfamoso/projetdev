FROM php:8.2-apache

RUN docker-php-ext-install pdo pdo_pgsql pgsql

COPY . /var/www/html/

RUN a2enmod rewrite

# dire à Apache de servir le dossier src
RUN sed -i 's!/var/www/html!/var/www/html/src!g' /etc/apache2/sites-available/000-default.conf

ENV PORT=10000
RUN sed -i "s/80/${PORT}/g" /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf

EXPOSE 10000
CMD ["apache2-foreground"]