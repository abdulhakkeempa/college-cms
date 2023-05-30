# Base image
FROM php:8.1.13-apache

# Set working directory
WORKDIR /var/www/html

# Install dependencies
RUN apt-get update && apt-get install -y \
  libzip-dev \
  unzip \
  && docker-php-ext-install zip \
  && docker-php-ext-install pdo_mysql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy project files
COPY . .

# Install project dependencies
RUN composer install --no-interaction --optimize-autoloader

# Generate key
RUN php artisan key:generate

# Set permissions
RUN chown -R www-data:www-data storage bootstrap/cache

# Install Node.js and npm
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash -
RUN apt-get install -y nodejs

# Install Vite dependencies
RUN npm install -g yarn
RUN yarn install

# Build Vite assets
RUN yarn run build

# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
