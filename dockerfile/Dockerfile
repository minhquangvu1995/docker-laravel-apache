FROM php:7.4.26-apache-bullseye
ARG ENVIRONMENT
ARG APPNAME

RUN apt-get update && apt-get install -y libzip-dev wget gnupg2

# Install php extensions
RUN docker-php-ext-install mysqli pdo_mysql zip opcache \
    && docker-php-ext-enable opcache \
    && pecl install redis && docker-php-ext-enable redis

# TODO-5: Apache Config Basic Settings
COPY dockerfile/${ENVIRONMENT}/apache/ /etc/apache2/sites-available/

RUN set -x \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN set -x \
    && a2enmod rewrite headers\
    && a2enconf security \
    && a2ensite 000-default ${APPNAME} healthcheck

COPY . /app/${APPNAME}

# Expose ports
EXPOSE 80
