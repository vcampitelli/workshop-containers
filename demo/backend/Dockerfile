FROM php:8.2-fpm-alpine

WORKDIR /var/www/html

# Instalando pacotes
RUN apk --no-cache add $PHPIZE_DEPS linux-headers && \
    pecl install xdebug && \
    docker-php-ext-install pdo pdo_mysql && \
    docker-php-ext-enable xdebug && \
    apk --no-cache del $PHPIZE_DEPS

# Instalando depdendências
COPY ["composer.json", "composer.lock", "./"]
COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --no-interaction

# Copiando resto da aplicação
COPY . ./

# A imagem base já expõe a porta 9000 e possui o comando do php-fpm
