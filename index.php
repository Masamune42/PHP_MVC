<?php

// Définition de la page courante
if(isset($_GET['page']) && !empty($_GET['page']))
{
    $page = trim(strtolower($_GET['page']));
} else {
    $page = 'home';
}

// Array contenant toutes les pages
$allPages = scandir('controllers/');

// Si dans la liste des pages il y a celle que l'on veut
if(in_array($page.'_controller.php', $allPages))
{
    // Inclusion de la page
    include_once 'models/'.$page.'_model.php';
    include_once 'controllers/'.$page.'_controller.php';
    include_once 'views/'.$page.'_view.php';
} else {
    // Retour d'une erreur
    echo 'Erreur 404';
}