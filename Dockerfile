FROM php:7.3-fpm

# Copy composer.lock and composer.json
COPY composer.json /var/www/

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    libzip-dev \
    zip \
    jpegoptim optipng pngquant gifsicle \
    nano \
    unzip \
    git \
    curl

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install gd pdo_mysql mbstring zip exif
RUN docker-php-ext-configure gd --with-gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/
RUN docker-php-ext-configure zip --with-libzip


# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for laravel application
RUN groupadd -g 1000 laraveluser
RUN useradd -u 1000 -ms /bin/bash -g laraveluser laraveluser

# Copy existing application directory contents
COPY . /var/www

# Copy existing application directory permissions
COPY --chown=laraveluser:laraveluser . /var/www

# Change current user to www
USER laraveluser

# Expose port 9000 and start php-fpm server
EXPOSE 9000

CMD [ "php-fpm" ]
