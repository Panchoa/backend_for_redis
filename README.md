# backend_for_redis
TP3 NoSQL - François MONTAGNÉ & Tristan PINAUDEAU

Le but de ce TP est de mettre en place une application serveur capable de sauvegarder et consulter des notes.

Nous avons choisi de partir sur du PHP. 
Nous utiliserons Predis pour permettre la communication entre l'application PHP et Redis.

## Explication

Architecture du projet :
* A la raçine, un fichier `docker-compose.yml` permet de déploiyer l'application sous un ensemble de container docker.
    - Un container php-apache monte le code de l'application en volume et expose son port 80 sur la machine hote.
    - Un container redis est lié au container php-apache.
* Le fichier notes.php est le point d'entrée de l'application et sera placé à la racine du serveur web.
* Le dossier predis contient la librairie qui nous permet d'abstraire la communication avec redis.

## Usage

Lorsque vous exécutez les containers en local avec `docker-compose up`, utilisez curl :
```sh
$ curl -X [METHOD] --data [DATA] http://localhost:8080/notes.php?[QUERY]
```

| METHOD   | DATA       | QUERY    | Usage                                               |
| -------- | ---------- | -------- | --------------------------------------------------- |
| `POST`   | `note=...` |          | Ajoute une note à la base et retourne son id généré | 
| `GET`    |            |          | Retourne toutes les notes et leurs id au format csv |
| `GET`    |            | `id=...` | Retourne une note spécifique                        |
| `DELETE` |            | `id=...` | Supprime une note spécifique                        |
| `DELETE` |            |          | Supprime toutes les notes de la base                |

