FROM php:8.2-apache

# Set Apache to use /var/www/html as document root
RUN sed -i 's!/var/www/html!/var/www/html!' /etc/apache2/sites-available/000-default.conf

# Copy your project files into Apache web root
COPY . /var/www/html/

# Enable Apache mod_rewrite if needed (optional)
RUN a2enmod rewrite

# Expose port 80 for Render
EXPOSE 80
