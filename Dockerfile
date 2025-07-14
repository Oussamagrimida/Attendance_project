FROM php:8.2-apache

# Install PDO and MySQL driver
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Copy your project files into Apache web root
COPY . /var/www/html/

# Enable Apache mod_rewrite (optional)
RUN a2enmod rewrite

EXPOSE 80
