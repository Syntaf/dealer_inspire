FROM php:7.4-fpm

WORKDIR /srv/dealer_inspire/

# Install core dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    gnupg2 \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install node & npm
RUN curl -sL https://deb.nodesource.com/setup_12.x | bash - && \
    apt-get install -yq nodejs
RUN npm install -g npm

# Install zip extension dependencies
RUN echo "deb http://packages.dotdeb.org jessie all" >> /etc/apt/sources.list
RUN echo "deb-src http://packages.dotdeb.org jessie all" >> /etc/apt/sources.list
RUN curl -sS --insecure https://www.dotdeb.org/dotdeb.gpg | apt-key add -

RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev

# Install extensions
RUN docker-php-ext-install pdo_mysql exif zip pcntl gd

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy existing application directory contents
COPY . /srv/dealer_inspire/
RUN composer install

RUN chown -R www-data:www-data /srv/dealer_inspire

# Expose port 9999 and start php simple server to adhere to coding test guidelines
EXPOSE 9999
CMD ["php", "-S", "0.0.0.0:9999", "-t", "public"]