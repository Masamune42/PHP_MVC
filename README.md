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
Si on accède à l'adresse : http://localhost/PHP_MVC/Structure/
On sera automatiquement redirigé vers la page index.php
On va détecter que la valeur de la méthode GET est vide donc, en passant par la condition, on sera redirigé vers home.
http://localhost/PHP_MVC/Structure/ = http://localhost/PHP_MVC/Structure/?page=home


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
    - Permet de réécrire un lien, ex : http://localhost/PHP_MVC/Structure/contact -> http://localhost/PHP_MVC/Structure/index.php?page=contact


Utiliser la structure : Créer un blog
============

### BDD
Création d'un fichier SQL temporaire (table.sql) pour créer la BDD dans PHPMyAdmin

### Création de classes
On crée les classes Authors, Categories et Articles.

Dans chaque classe on va appeler "global $db" afin d'aller chercher $db déclarée dans db.php et de pouvoir l'utiliser dans la classse appelante.

Création de 2 fonctions dans chaque classe :
- Le constructeur qui prend en paramètre l'id de l'objet
- Une fonction static retournant la liste de tous les objets présents en BDD.

Inclusion des classes
````PHP
// index.php

// ...
include_once '_classes/Articles.php';
include_once '_classes/Authors.php';
include_once '_classes/Categories.php';

// ...
````

### Utilisation d'un thème Bootstrap
Thème utilisé : https://getbootstrap.com/docs/4.4/examples/blog/
- On copie/colle tout le contenu de la page
- On récupère tout ce qui se trouve dans le Bootstrap core CSS (.min.css) pour le mettre dans un fichier boootstrap.css
- Idem pour le thème principal blog.css à placer dans le style.css
- Couper/coller : header et footer -> .php
- Supprimer tout le head
- Inclusion :
````html
<!-- head.php -->
<!-- CSS Styles -->
<link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
<link rel="stylesheet" href="assets\styles\css\bootstrap.css" />
<link rel="stylesheet" href="assets\styles\css\styles.css" />
````

### Afficher les articles et catégories
````PHP
// controllers/home_controllers.php
include_once '_classes/Articles.php';
include_once '_classes/Categories.php';

$allArticles = Articles::getAllArticles();
$allCategories = Categories::getAllCategories();
$lastArticle = Articles::getLastArticle();
$lastArticleLeft = Articles::getLastArticle(5);
$lastArticleRight = Articles::getLastArticle(3);
````


````PHP
// views/home_view.php
// ...
// Affichage du dernier article posté en BDD en utilisant la variable $lastArticle du controller
<?php foreach ($allCategories as $index => $category) : ?>
    <a class="p-2 text-muted" href="#"><?= $category['name'] ?></a>
<?php endforeach ?>
// ...
// Affichage du dernier article posté de 2 catégories différentes en BDD en utilisant la variable $lastArticle du controller
// ...
// Affichage de toutes les catégories présentes en BDD en utilisant la variable $allCategories du controller
<?php foreach ($allCategories as $index => $category) : ?>
                    <a class="p-2 text-muted" href="#"><?= $category['name'] ?></a>
<?php endforeach ?>
// ...

// Affichage de tous les articles présents en BDD en utilisant la variable $allArticles du controller
<?php
foreach ($allArticles as $index => $article) : ?>
<div class="blog-post">
    <h2 class="blog-post-title"><?= $article['title'] ?></h2>
    <p class="blog-post-meta"><?= date_format(date_create($article['date']),"d/m/Y H:i") ?> par <a href="#"><?= $article['firstname'] .' '. strtoupper($article['lastname']) ?></a></p>
    <p><?= $article['content'] ?></p>
</div><!-- /.blog-post -->
<?php endforeach ?>
````
### Page de contact
Création d'une page de contact :
- contact_view.php
- contact_controller.php
- contact_model.php



Tips
========
### Pour debuger et vérifier les variables
````PHP
// index.php
// Création d'un article avec un id (constructeur)
$var = new Articles(1);
debug($var); // ou var_dump($var)
exit;
````
````PHP
// Récupération de tous les auteurs (fonction static)
$var = Authors::getAllAuthors();
debug($var);
exit;
````