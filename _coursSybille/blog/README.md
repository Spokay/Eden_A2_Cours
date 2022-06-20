# Création d'un Blog Ok, Boomer

BDD dans src/config
je n'ai pas eu le temps de faire l'affichage des commentaires de commentaires par manque de temps, pareil pour les dates en francais et l'erreur du login

**Objectif**:  > Corriger 2 erreurs identifiées sur le développement produit lors de l’évaluation #4  

Erreurs : 
password varchar(20) --> password varchar(255)


 > Ajouter les commentaires d’un article en utilisant l’Ajax.
 > Permettre l’affichage de la météo du jour selon les spécifications fournies sur la base d’une API externe (user story 2 dans les spécifications)

## Etape 1 - La structure de fichiers

Notre application aura la stucture suivante

```

    public/
        index.php
        style.css
        image/
    src/
        Controllers/
            ArticleController.php
            UserController.php           
        Models/
            User.php
            Article.php
            Role.php
            UserManager.php
            ArticleManager.php
            RoleManager.php
        Views/
            Article/
                index.php
                homepage.php
                create.php
            Auth/
                login.php
                register.php
            
        Router.php
```

## Etape 2 - Composer et l'autoloading

- Initialiser le dossier comme étant un projet composer

```shell
$ composer init  # crée le fichier composer.json
$ composer install # install l'autoloader
```

- Remplir le fichier composer avec la règle d'autoloading

```json
"autoload": {
    "psr-4": {
        "RootName\\": "src/"
    }
}
```

- Réinitialiser l'autoloader

```shell
$ composer dump-autoload
```
- Installer la BDD (config/exam_blog.sql)
- login:titi et PW:tititi

//lancer php -S localhost:8000 dans le dossier public

## Etape 3 - Le router


Voici la liste de route implementée:

- "/", GET => Accueil
- "/login, GET => page de connexion
- "/login, POST =>  vérifie la connexion
- "/logout, GET => déconnexion
- "/register, GET => page d'inscription
- "/register, POST =>  crée le nouveau user
- "/dashboard, GET => dashboard qui montre tous les articles de l'utilisateur
- "/dashboard/nouveau, GET => création d'un article
- "/dashboard/nouveau, POST => crée l'article en base dde données
- "/dashboard/{article}/delete => supprime l'article

