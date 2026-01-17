# Utilitzem la imatge oficial de PHP amb Apache
FROM php:8.2-apache

# Instal·lem extensions de PHP si són necessàries
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Habilitem el mod_rewrite d'Apache per URLs amigables
RUN a2enmod rewrite

# Instal·lem eines d'auditoria
RUN apt-get update && apt-get install -y \
    net-tools \
    iproute2 \
    procps \
    curl \
    vim \
    && rm -rf /var/lib/apt/lists/*

# Copiem els fitxers del projecte al directori d'Apache
COPY . /var/www/html/

# IMPORTANT: Configurem Apache per servir des de public/
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Configurem els permisos adequats
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Configurem permisos al directori public
RUN echo '<Directory /var/www/html/public>' >> /etc/apache2/sites-available/000-default.conf \
    && echo '    Options -Indexes +FollowSymLinks' >> /etc/apache2/sites-available/000-default.conf \
    && echo '    AllowOverride All' >> /etc/apache2/sites-available/000-default.conf \
    && echo '    Require all granted' >> /etc/apache2/sites-available/000-default.conf \
    && echo '</Directory>' >> /etc/apache2/sites-available/000-default.conf

# SEGURETAT: Ocultar versió d'Apache i PHP
RUN echo "ServerTokens Prod" >> /etc/apache2/conf-available/security.conf \
    && echo "ServerSignature Off" >> /etc/apache2/conf-available/security.conf

# SEGURETAT: Desactivar llistat de directoris
RUN sed -i 's/Options Indexes FollowSymLinks/Options -Indexes +FollowSymLinks/' /etc/apache2/apache2.conf

# Desactivar redirecció de logs a stdout i crear fitxers reals
RUN rm -f /var/log/apache2/access.log /var/log/apache2/error.log \
    && touch /var/log/apache2/access.log /var/log/apache2/error.log \
    && chown www-data:www-data /var/log/apache2/access.log /var/log/apache2/error.log \
    && chmod 644 /var/log/apache2/access.log /var/log/apache2/error.log

# Exposem el port 80
EXPOSE 80

# Comando per iniciar Apache en primer pla
CMD ["apache2-foreground"]


