#ON utilser l'imae officielle de PHP avec apache
FROM php:7.2-apache

#Installer l'extension de pdo mysqlclear
RUN docker-php-ext-install pdo_mysql

#Copier les fichier de notre application dans le dossier public de notre serveur /var/www/html/
# COPY index.php /var/www/html/
# COPY modifier.php /var/www/html/
# COPY traitement.php /var/www/html/
# COPY static/* /var/www/html/
COPY . /var/www/html/

#Changer les permissions des fichiers
RUN chmod -R 755 /var/www/html/

#Activer le mode_rewrite pour apache
RUN a2enmod rewrite