# Use an official PHP image as a base image
FROM php:8.3-fpm

# Set the working directory in the container
WORKDIR /www/opt

# Copy only composer files first to leverage Docker cache
COPY composer.json composer.lock ./

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    && docker-php-ext-install pdo_mysql zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*  # Clean up to reduce image size

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy the Symfony project files to the container
COPY . .

# Install Symfony dependencies
RUN composer install --no-scripts --no-autoloader

# Expose the port that the application will run on
EXPOSE 80

# Command to run Symfony
CMD ["php-fpm"]
