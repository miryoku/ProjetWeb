E-commerce
  Projet du cours de projet développement web.

Installation
  Cloner le répertoire.
  Installer un serveur mysql, créer une db et restorer le fichier dump.sql.
  Editer le fichier config/main.php avec les informations db et le titre du projet.
    DBUSERNAME=le nom utilisateur de la db
    DBPASSWORD=le mdp de la db
    DBDSN=nom de l'host et le nom de la db
    HOSTNAME=le lien de base (exemple =  http://test.com
    RACINE=le nom du dossier

Fonctionnement
  pour le mode admin faut ce connecte avec 
    admin@admin.admin 
    test

  Une fois connecté en tant qu'admin, vous aurez la possibilité via le menu Administration de:

    Gérer les articles (modifier/supprimer)
    Ajouter un manga
    ajouter un tome du manga 
    Gérer les commandes (voir le détail, valider ou annuler)
    Visualiser les statistiques
    Une fois que vous disposez d'au moins un article, les utilisateurs "client" pourront alors alimenter leur panier et confirmer des commandes.
