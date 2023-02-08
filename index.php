<?php

//spl_autoload_register(static function (string $sClass) {
//    $sFilepath = str_replace(['\\', 'Blog/'], ['/', 'src/'], $sClass) . '.php';
//    if (file_exists($sFilepath)) {
//        require_once $sFilepath;
//    }
//});

require 'vendor/autoload.php';

session_start();

require_once 'lib/config.php';
require_once 'function.php';

if (!isset($_SESSION['id'])) {
    $_SESSION['id'] = uniqid("", false);
    $_SESSION['flashes'] = [];
}

$sPage = $_GET['page'] ?? PAGE_HOME;
if (!array_key_exists($sPage, ROUTING)) {
    $sPage = PAGE_HOME;
}

[$sClass, $sFunction] = explode('::', ROUTING[$sPage]);
echo (new $sClass())->$sFunction();

//echo '<pre>';
// print_r($_SESSION);  // Utiliser les info des sessions utilisateur
// print_r($_GET);       // Données contenues dans l'url
// print_r($_POST);      // Données de formulaire
// print_r($_SERVER);    // Données "serveur" créées par php
// print_r($_COOKIE);    // Données cookies fournies par le navigateur
//echo '</pre>';

