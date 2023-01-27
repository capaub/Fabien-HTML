<?php

spl_autoload_register(function (string $sClass) {
    $sFilepath = str_replace(['\\', 'Blog/'], ['/', ''], $sClass) . '.php';
    if (file_exists($sFilepath)) {
        require_once $sFilepath;
    }
});

session_start();

use Blog\Model\Article;
use Blog\Model\User;
use Blog\Model\Address;
use Blog\Repository\ArticleRepository;
use Blog\Repository\CategoryRepository;
use Blog\Repository\UserRepository;

require_once 'lib/config.php';
require_once 'function.php';
//require_once 'Model/Article.php';
//require_once 'Model/Category.php';
//require_once 'Model/User.php';
//require_once 'Repository/UserRepository.php';
//require_once 'Repository/ArticleRepository.php';
//require_once 'Repository/CategoryRepository.php';

$aFlashMessages = [];

//$aCategory = CategoryRepository::findAll();

print_r($aFlashMessages);

//UserRepository::isExist($sUsername);
//UserRepository::find($sUsername);
//UserRepository::findAll();
//UserRepository::save($oUser);


//echo '<pre>';
// print_r($_SESSION);  // Utiliser les info des sessions utilisateur
// print_r($_GET);       // Données contenues dans l'url
// print_r($_POST);      // Données de formulaire
// print_r($_SERVER);    // Données "serveur" créées par php
// print_r($_COOKIE);    // Données cookies fournies par le navigateur
//echo '</pre>';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo $sTitle = $_GET['title'] ?? TITLE_HOME; ?>- Mon site</title>
    <meta name="description" content="super blog">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include 'views/header.php';

if (isset($_POST["field_login_username"], $_POST["field_login_password"])) {
    $sUsername = strip_tags($_POST["field_login_username"]);
    $sPassword = strip_tags($_POST["field_login_password"]);

    $oUser = authUser($sUsername, $sPassword);
    if ($oUser instanceof User) {
        $_SESSION['user'] = $oUser;
        echo 'authentificiation réussit';
        $aFlashMessages[] = ['SUCCESS' => 'logged'];
    }

    $aFlashMessages[] = ['ERREUR' => 'MdP ou Username invalide'];
}

if (isset(
    $_POST["field_username"],
    $_POST["field_email"],
    $_POST["field_birthdate"],
    $_POST["field_password"],
    $_POST["field_street"],
    $_POST["field_postalCode"],
    $_POST["field_city"],
    $_POST["field_country"],
)) {
    $sUsername = strip_tags($_POST["field_username"]);
    $sEmail = strip_tags($_POST["field_email"]);
    $dBirthDate = strip_tags($_POST["field_birthdate"]);
    $sPassword = strip_tags($_POST["field_password"]);
    $sStreet = strip_tags($_POST["field_street"]);
    $sPostalCode = strip_tags($_POST["field_postalCode"]);
    $sCity = strip_tags($_POST["field_city"]);
    $sCountry = strip_tags($_POST["field_country"]);

    $oAddress = new Address(
        $sStreet,
        $sPostalCode,
        $sCity,
        $sCountry,
    );

    if (!UserRepository::isExist($sUsername)) {
        $oUser = new User($sUsername, $sEmail, new DateTime($dBirthDate), hashPassword($sPassword), $oAddress);
        UserRepository::save($oUser);
        $aFlashMessages[] = ['SUCCESS' => 'utilisateur enregistré'];
        header('Location: index.php?page=home');
        exit;
    }

    $aFlashMessages[] = ['ERREUR' => 'utilisateur existant'];
}

if (isset($_POST["field_article_subject"], $_POST["field_article_content"], $_POST["field_article_type"])) {

    foreach ($aCats as $oCat) {
        if ($_POST["field_article_type"] === $oCat->getName()) {
            $oArticle = new Article($_POST["field_article_subject"], $_POST["field_article_content"], $oCat);
            ArticleRepository::save($oArticle);
            break;
        }
    }
}


print_r($aFlashMessages);

$sPage = $_GET['page'] ?? PAGE_HOME;
$sFilename = 'views/' . $sPage . '.php';
if (!file_exists($sFilename)) {
    $sFilename = 'views/home.php';
}
include $sFilename;

include 'views/footer.php';
?>
<script src="js/script.js"></script>
</body>
</html>