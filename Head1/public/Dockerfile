FROM php:apache

COPY ./flag.txt /
RUN mv /flag.txt /flag_$(openssl rand -hex 10)

COPY ./index.php /var/www/html/
