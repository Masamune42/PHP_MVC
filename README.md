# PHP_MVC

Cours udemy sur le model MVC avec PHP

## IDE utilisé
- Visual Studio Code -> Extensions : 
    - PHP Intelliphense
    - PHP DocBlocker
    - IntelliJ IDEA Keybindings
    - PHP Getters & Setters
    - Apache Conf
    - Apache Conf Snippets

Présentation
===========
### Avantages
- Scinder le code (de manière logique)
- Ne pas copier/coller du code
- Centraliser l'entrée des visiteurs (=plus de contrôle)
- Sécuriser son site

### Inconvénient
- Inutile pour un petit projet

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

Comprendre la structure
============
### index.php
Détection de la page reçue sur $_GET et redirection suivant le nom.

### Création home dans chaque sous dossier
controllers/home_controller.php
models/home_model.php
views/home_view.php

### Explications sur la redirection de index.php
Si on accède à l'adresse : http://localhost/PHP_MVC/
On sera automatiquement redirigé vers la page index.php
On va détecter que la valeur de la méthode GET est vide donc, en passant par la condition, on sera redirigé vers home.
http://localhost/PHP_MVC/ = http://localhost/PHP_MVC/?page=home


### Création des header, footer et head
- views\includes\header.php
- views\includes\head.php
- views\includes\footer.php

### Création d'une barre de navigation
Dans la barre de navigation header.php on indique toujours des chemins ramenant à index.php
- Pour home : index.php?page=home
- Pour contact : index.php?page=home

A changer plus tard lors de la configuration du [.htaccess](#user-content-htaccess)

### Pour stocker des images spécifiques
Créer des dossiers en plus : icones, users (images de profil), brand

### Pour stocker les fichiers js spécifiques à des pages
Créer des dossiers en plus : home, contact...

### CSS
Créer un dossier css dans assets

### _config
- config.php :
    - Paths :
        - Contient toutes les constantes globales
        - PATH_REQUIRE -> Adresse complète du projet à partir du C: et en retirant index.php à la fin, à utiliser dans les include et require pour être sûr d'appeler les bons fichiers
        - PATH -> Lien courant du site, à utiliser pour les src et href

    - Website informations :
        Informations du site : title, name, author, etc...

    - Facebook Open Graph tags :
        Afficher des infos sur d'autres sites quand partagé
    
    - DataBase informations
    

- db.php :
    - Connexion à la BDD
    - Création d'un variable $db qui reçoit l'objet PDO pour établir la connexion à la BDD
    - Utilisation des variables globales (à configurer) pour se connecter à la BDD

### _functions
fonctions utilisables dans toutes les pages

### _classes
Stock les classes à utiliser pour qu'elles soient appelées dans les model.php

### .htaccess
Permet de configurer directement Apache (serveur HTTP)
.htaccess : On va pouvoir ajouter des configurations à Apache sur notre site courant.

- URL rewriting :
    - Permet de réécrire un lien, ex : http://localhost/PHP_MVC/contact -> http://localhost/PHP_MVC/index.php?page=contact


Utiliser la structure : Créer un blog
============
