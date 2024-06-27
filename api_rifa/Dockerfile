FROM php:7.4-apache
RUN echo 'memory_limit = 512M' >> /usr/local/etc/php/conf.d/docker-php-memlimit.ini;
RUN echo 'upload_max_filesize = 50M' >> /usr/local/etc/php/conf.d/docker-php-uploads.ini;
RUN apt-get update && apt-get --yes --force-yes cron g++ gettext libicu-dev openssl libc-client-dev libkrb5-dev libxml2-dev libfreetype6-dev libgd-dev libmcrypt-dev bzip2 libbz2-dev libtidy-dev libcurl4-openssl-dev libz-dev libmemcached-dev libxslt-dev

RUN docker-php-ext-install mysqli 
RUN docker-php-ext-enable mysqli

RUN docker-php-ext-configure gd --with-freetype=/usr --with-jpeg=/usr
RUN docker-php-ext-install gd

RUN pecl install grpc && docker-php-ext-enable grpc
RUN apt-get install -y autoconf pkg-config libssl-dev 

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# install composer
RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer

RUN a2enmod rewrite
WORKDIR /var/www
COPY ./ /var/www/
RUN rm -r /var/www/html && mv /var/www/public /var/www/html && chmod -R 0777 /var/www/storage/
RUN composer install

#COPY ./ /var/www/html/