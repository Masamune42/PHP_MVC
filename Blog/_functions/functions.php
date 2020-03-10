<?php

/**
 * Permet de sécuriser une chanine de caractères
 *
 * @param $string
 * @return string
 */
function str_secur($string)
{
    return trim(htmlspecialchars($string));
}

/**
 * Debug plus lisible des différentes variables (à vérifier si toujours utile)
 *
 * @param $var
 */
function debug($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}

/**
 * Détection de la langue reçue
 *
 * @return $lang
 */
function getUserLanguage()
{
    if (isset($_GET['lang']) && !empty($_GET['lang'])) {
        $lang = str_secur(strtolower($_GET['lang']));
        $availableLanguages = ['en', 'fr'];
        return (in_array($lang, $availableLanguages)) ? $lang : DEFAULT_LANGUAGE;
    } else {
        return (isset($_SESSION['lang']) && !empty($_SESSION['lang'])) ? $_SESSION['lang'] : DEFAULT_LANGUAGE;
    }
}

/**
 * Obtenir les pages traduites dans la langue voulue
 *
 * @param  $lang
 * @param  $pages
 * @return object
 */
function getPageLanguage($lang, $pages)
{
    $dataPage = [];
    foreach ($pages as $p) {
        $jsonString = file_get_contents('_langue/' . $lang . '/' . $p . '.json');
        $json = json_decode($jsonString);
        $dataPage[$p] = $json;
    }
    return (object) $dataPage;
}
