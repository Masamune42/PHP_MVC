<?php

$allArticles = Articles::getAllArticles();
$allAuthors = Authors::getAllAuthors();

debug($allArticles);
debug($allAuthors);

exit;