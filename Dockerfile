FROM php:8.2-apache

# Install PDO MySQL driver
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Change Apache to listen on port 10000
RUN sed -i 's/80/10000/g' /etc/apache2/ports.conf && \
    sed -i 's/80/10000/g' /etc/apache2/sites-available/000-default.conf

# Copy your app files into Apache root
COPY . /var/www/html/

# Enable Apache Rewrite if needed
RUN a2enmod rewrite

# Expose Render's required port
EXPOSE 10000
