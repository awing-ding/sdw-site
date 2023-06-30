# Un guide Rapide dans les méandres du site

- public_html/ : contient les fichiers du site web
    - admin/ : contient les fichiers du pannel d'administration
    - api/ : contient le point de terminaison de l'API
    - include/ : contient les fichiers de connexion à la base de données, des fonctions, la barre de navigation et le pied de page et le css.
        - models/ : contient les fichiers de définition des classes pour l'api
    - membres/ : contient les fichiers accessibles aux membres et à tous
        - bilan/ : contient les fichiers affichant le bilan
        - traitement/ : contient le fichier de traitement du formulaire de connexion
    - .htaccess : fichier de configuration du serveur apache, contient les règles de réécriture (supression de l'extension des fichiers, force le https) mais aussi les variables d'environnement pour la connexion à la base de données (SetEnv), pour des raisons de sécurité ce fichier n'est pas présent sur le dépôt à partir de ce commit.