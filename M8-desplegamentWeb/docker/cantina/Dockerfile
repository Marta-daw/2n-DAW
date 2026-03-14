# Use an official PHP image with Apache
FROM php:8.2-apache

# Install Nano (optional)
RUN apt-get update && \
    apt-get install -y nano && \
    rm -rf /var/lib/apt/lists/*

# Copy SSL certificate and key
COPY lacantina.crt /etc/ssl/certs/lacantina.crt
COPY lacantina.key /etc/ssl/private/lacantina.key

# Copy the custom Apache virtual host config
COPY ./lacantina-vhosts.conf /etc/apache2/sites-available/lacantina.conf

# Enable SSL module, configure Apache for PHP support, and enable our SSL site configuration
RUN a2enmod ssl && \
    a2enmod rewrite && \
    a2dissite 000-default default-ssl && \
    a2ensite lacantina

# NO copies public-html aquí, se monta con volumen
# COPY ./public-html/ /var/www/html/

EXPOSE 80 443