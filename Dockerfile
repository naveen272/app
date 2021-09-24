FROM php:7.2.24-cli
COPY . /var/www/html
WORKDIR /var/www/html
CMD [ "php", "./index.php" ]
