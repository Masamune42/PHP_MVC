# PHP_MVC

Cours udemy sur le model MVC avec PHP

Présentation
===========
Avantages :
- 1
- 2

Inconvéniants :
- 3

### C'est quoi le MVC?
- Models : Classe dédiées au différentes pages
- Views : HTML
- Controllers : Partie qui fait va faire le traitement en php (ex : formulaire).
- Points d'accès : Vérifie si le visiteur a le droit d'accéder aux pages, s'il a la bonne addresse IP

### Structure générale
- models
- views
- controllers
- assets
    - images
    - js
    - styles
- _config (permet de se connecter à la BDD et avoir nos constantes)
- _functions (contient les fichiers avec nos fonctions)
- _classes (contient les classes PHP / POO)
- _scripts (traitement PHP qui ne sont pas des pages)

- index.php (redirige vers la page voulue)

Utilisation
============
index.php : Détection de la page reçue sur $_GET et redirection suivant le nom.

### Création home dans chaque sous dossier :
controllers/home_controller.php
models/home_model.php
views/home_view.php

Si on accède à l'adresse : http://localhost/PHP_MVC/
On sera automatiquement redirigé vers la page index.php
On va détecter que la valeur de la méthode GET est vide donc, en passant par la condition, on sera redirigé vers home.
http://localhost/PHP_MVC/ = http://localhost/PHP_MVC/?page=home


### Créer : 
- views\includes\header.php
- views\includes\head.php
- views\includes\footer.php

### Création d'un barre de navigation :
header.php
Dans la barre de navigation on indique toujours des chemins ramenant à index.php
pour home : index.php?page=home
pour contact : index.php?page=home

Pour stocker des images spécifiques :
Créer des dossiers en plus : icones, users (images de profil), brand

Pour stocker les fichiers js spécifiques à des pages :
Créer des dossiers en plus : home, contact...

### CSS :
Créer un dossier css dans assets

### _config :
- config.php :
    - Paths :
        Contient toutes les constantes globales
        PATH_REQUIRE -> Adresse complète du projet à partir du C: et en retirant index.php à la fin
                    -> A utiliser dans les include et require pour être sûr d'appeler les bons fichiers
        PATH -> Lien courant du site
            -> A utiliser pour les src et href

    - Website informations :
        Informations du site : title, name, author, etc...

    - Facebook Open Graph tags :
        Afficher des infos sur d'autres sites quand partagé
    
    - DataBase informations
    

- db.php :
    connexion à la BDD
    création d'un variable $db qui reçoit l'objet PDO pour établir la connexion à la BDD
    utilisation des variables globales (à configurer) pour se connecter à la BDD

### _functions : fonctions utilisables dans toutes les pages

### _classes : Stock les classes à utiliser pour qu'elles soient appelées dans les model.php

