# Use the official PHP 8.2-FPM image
FROM php:8.2-fpm

# Set working directory inside the container
WORKDIR /var/www

# Install system dependencies for PHP extensions
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev \
    libzip-dev git unzip && apt-get clean

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd zip pdo pdo_mysql

# Install Composer (PHP dependency manager)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy the application code into the container
COPY . .

# Install PHP dependencies with Composer
RUN composer install --no-scripts --no-autoloader --prefer-dist

# Expose the port the app will run on
EXPOSE 8000

# Start PHP-FPM server
CMD ["php-fpm"]
