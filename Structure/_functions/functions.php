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
