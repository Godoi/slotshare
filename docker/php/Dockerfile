# docker/php/Dockerfile
FROM php:8.2-fpm

# Instalação, compilação e habilitação ATÔMICAS — tudo em um único RUN com fail-fast
RUN set -eux; \
    apt-get update; \
    apt-get install -y --no-install-recommends \
        git zip unzip \
        libzip-dev \
        libicu-dev \
        libonig-dev \
        libxml2-dev \
        libmariadb-dev-compat \
        libmariadb-dev \
        pkg-config \
    ; \
    # Compila extensões
    docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd; \
    docker-php-ext-install -j$(nproc) \
        pdo_mysql \
        mysqli \
        intl \
        opcache \
        zip \
    ; \
    # Habilita extensões (gera os .ini)
    docker-php-ext-enable pdo_mysql mysqli; \
    # Limpeza
    apt-get clean; \
    rm -rf /var/lib/apt/lists/*

# Xdebug 3.3 — compatível com PHP 8.2
RUN pecl install xdebug-3.3.0 \
    && docker-php-ext-enable xdebug

# Configurações de desenvolvimento (não use em produção!)
RUN echo "date.timezone = UTC" > /usr/local/etc/php/conf.d/99-timezone.ini \
    && echo "error_reporting = E_ALL" > /usr/local/etc/php/conf.d/98-error-reporting.ini \
    && echo "display_errors = On" >> /usr/local/etc/php/conf.d/98-error-reporting.ini \
    && echo "log_errors = On" >> /usr/local/etc/php/conf.d/98-error-reporting.ini

# Xdebug — safe para containers (sem /tmp)
RUN { \
        echo 'zend_extension=xdebug.so'; \
        echo 'xdebug.mode = debug,coverage'; \
        echo 'xdebug.start_with_request = yes'; \
        echo 'xdebug.client_host = host.docker.internal'; \
        echo 'xdebug.client_port = 9003'; \
        echo 'xdebug.log = /dev/stderr'; \
        echo 'xdebug.idekey = VSCODE'; \
    } > /usr/local/etc/php/conf.d/90-xdebug.ini

# Composer 2.7+ (oficial)
COPY --from=composer:2.7 /usr/bin/composer /usr/local/bin/composer

WORKDIR /var/www/html

# Healthcheck (opcional, mas útil)
HEALTHCHECK --interval=30s --timeout=3s --start-period=5s --retries=3 \
    CMD php -r "exit(extension_loaded('pdo_mysql') && extension_loaded('xdebug') ? 0 : 1);"