<?php

require_once '_classes/Db_classe.php';

// Avant ajout de la classe Db_classe
$db = new PDO('mysql:host=' . DATABASE_HOST . ';dbname=' . DATABASE_NAME . ';charset=utf8', DATABASE_USER, DATABASE_PASSWORD);

// Après akpit de ma cmasse Db_classe
// $db = new DB(DATABASE_HOST,DATABASE_NAME,DATABASE_USER,DATABASE_PASSWORD);
// $db->setFetchMode(PDO::FETCH_ASSOC);