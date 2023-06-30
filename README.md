# Site pour RP

Ceci est un site fait pour gérer des rp de stratégie discord

NB: l'API ne doit **pas** être manipulée **imprudemment**, elle ne fait que peu de vérification et une erreur dans les inputs peut causer des **dégâts** dans la base de données.

Désolé pour vos yeux, je suis incompétent en CSS.

Le point de terminaison de l'API REST se situe à /api/centralized, il nécessite une authentification pour être utilisé ; chaque méthode http (GET, POST, PUT, DELETE) attend en entrée un fichier JSON contenant : l'id de la ligne à modifier ; les informations nécessaire (pour PUT et POST).
En sortie chaque méthode renverra: 
- un code HTTP correspondant au statut du traitement (200 OK, 400 Bad Request (probablement des données manquantes), 401 Unauthorized (non identifié), 403 Forbidden (authentifié mais mauvais id), 404 Not Found (Id GET probablement incorrect), 405 Method Not Allowed (utilisation d'une méthode autre que GET/PUT/POST/DELETE), 500 Internal Server Error (erreur de traitement))
- fichier JSON contenant:
    - Un message accompagnant le statut de la requête et précisant le type d'erreur si il y en a (propriété message/notice/error) message signifie qu'il n'y a eut aucune erreur, notice signifie qu'une erreur mineure s'est produite (probablement l'utilisation de la méthode PUT sur un id encore inexistant) et error précise une erreur qui a empéché la requête de s'executer
    - les données dans le cas de la méthode GET

public_html/.htaccess **doit** exister à cet emplacement et contenir les identifiants pour la base de données en définissant les variables d'environnement suivantes (en remplacant évidemment les valeurs par les votres):
```apacheconf
SetEnv db_host x
SetEnv db_name y
SetEnv username z
SetEnv password f
```