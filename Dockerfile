FROM php:8.2

RUN apt-get update

RUN apt-get install -y libssl-dev
RUN pecl install mongodb && docker-php-ext-enable mongodb

RUN apt-get install -y zip
COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .
RUN composer install --no-dev -o

ENTRYPOINT ["php", "-S", "0.0.0.0:8123", "-t", "public"]