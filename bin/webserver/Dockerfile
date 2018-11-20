FROM php:7.2-apache

COPY sources.list /etc/apt/sources.list

RUN apt-get -y update --fix-missing \
    && apt-get -y install apt-utils vim nano wget dialog build-essential git curl libcurl3 libcurl3-dev zip openssl

# Install Composer & Xdebug
RUN curl -fsS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && curl https://xdebug.org/files/xdebug-2.6.1.tgz -o /tmp/xdebug-2.6.1.tgz \
    && pecl install /tmp/xdebug-2.6.1.tgz \
    && docker-php-ext-enable xdebug

# Other PHP7 Extensions
RUN apt-get -y install libsqlite3-dev libsqlite3-0 mysql-client libfreetype6-dev libjpeg62-turbo-dev libpng-dev \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install pdo_sqlite \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install curl \
    && docker-php-ext-install tokenizer \
    && docker-php-ext-install json \
    && apt-get -y install zlib1g-dev \
    && docker-php-ext-install zip \
    && apt-get -y install libicu-dev \
    && docker-php-ext-install -j$(nproc) intl \
    && docker-php-ext-install mbstring \
    && docker-php-ext-install gettext \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/  \
    && docker-php-ext-install -j$(nproc) gd

# Enable apache modules and clean apt cache
RUN a2enmod rewrite headers \
    && rm -rf /var/lib/apt/lists/*