FROM php:apache
RUN docker-php-ext-install mysqli pdo_mysql
COPY index.html /var/www/html
COPY controller.php /var/www/html
COPY list.php /var/www/html