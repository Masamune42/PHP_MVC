<?php

// Par défaut, utilisation de fecthAll
// Sinon fetch avec un tableau vide et false -> retour d'une seule valeur qui est un tableau
// $articles = $db->fetch('SELECT * FROM articles', [], false);
// $articles = $db->fetch('SELECT * FROM articles WHERE category_id = ?', [1]);

// debug($articles);

// $result = $db->execute('DELETE * FROM articles');
// debug($result);

// $req = $db->prepare('SELECT * FROM articles');
// $req->execute();
// $values = $req->fetchAll();
