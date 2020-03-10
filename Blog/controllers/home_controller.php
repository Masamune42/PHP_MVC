<?php

$allArticles = Articles::getAllArticles();
$allCategories = Categories::getAllCategories();

$lastArticle = Articles::getLastArticle();
$lastArticleLeft = Articles::getLastArticle(5);
$lastArticleRight = Articles::getLastArticle(3);
