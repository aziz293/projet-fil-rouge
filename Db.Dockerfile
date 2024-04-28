# Utiliser l'image officielle MySQL
FROM mysql:5.7

# Définir la variable d'environnement pour le mot de passe de l'administrateur
ENV MYSQL_ROOT_PASSWORD=root

# Ajouter le script SQL qui initialise la base de données
ADD base_de_donnee/profil.sql /docker-entrypoint-profildb.d/