<?php

spl_autoload_register(static function (string $sClass) {
    $sFilepath = str_replace(['\\', 'Blog/'], ['/', ''], $sClass) . '.php';
    if (file_exists($sFilepath)) {
        require_once $sFilepath;
    }
});

session_start();

require_once 'lib/config.php';
require_once 'function.php';

use Blog\Model\Article;
use Blog\Model\User;
use Blog\Model\Address;
use Blog\Model\Category;
use Blog\Repository\ArticleRepository;
use Blog\Repository\CategoryRepository;
use Blog\Repository\UserRepository;

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'logout':
            session_destroy();
            session_start();
            break;
    }
}

if (!isset($_SESSION['id'])) {
    $_SESSION['id'] = uniqid("", false);
    $_SESSION['flashes'] = [];
}

if (isset($_POST["field_login_username"], $_POST["field_login_password"])) {
    $sUsername = strip_tags($_POST["field_login_username"]);
    $sPassword = strip_tags($_POST["field_login_password"]);

    $oUser = authUser($sUsername, $sPassword);
    if ($oUser instanceof User) {
        $_SESSION['user'] = $oUser;
        echo 'authentificiation réussit';
        $_SESSION['flashes'][] = ['success' => 'Bienvenue' . $oUser->getUserName()];
        header('Location: index.php?page=user');
        exit;
    }

    $_SESSION['flashes'][] = ['danger' => 'Identifiants invalides'];
}

if (isset(
    $_POST["field_signup_username"],
    $_POST["field_signup_email"],
    $_POST["field_signup_birthdate"],
    $_POST["field_signup_password"],
    $_POST["field_signup_street"],
    $_POST["field_signup_postalCode"],
    $_POST["field_signup_city"],
    $_POST["field_signup_country"],
)) {
    $sUsername = strip_tags($_POST["field_signup_username"]);
    $sEmail = strip_tags($_POST["field_signup_email"]);
    $dBirthDate = strip_tags($_POST["field_signup_birthdate"]);
    $sPassword = strip_tags($_POST["field_signup_password"]);
    $sStreet = strip_tags($_POST["field_signup_street"]);
    $sPostalCode = strip_tags($_POST["field_signup_postalCode"]);
    $sCity = strip_tags($_POST["field_signup_city"]);
    $sCountry = strip_tags($_POST["field_signup_country"]);

    $oAddress = new Address(
        $sStreet,
        $sPostalCode,
        $sCity,
        $sCountry,
    );
    if (!UserRepository::isExist($sUsername)) {
        $oUser = new User($sUsername, $sEmail, new \DateTime($dBirthDate), hashPassword($sPassword));
        UserRepository::save($oUser);
        $_SESSION['user'] = $oUser;
        $_SESSION['flashes'][] = ['SUCCESS' => 'user created'];
        header('Location: index.php?page=user');
        exit;
    }

    $_SESSION['flashes'][] = ['ERREUR' => 'utilisateur existant'];
}

if (isset(
        $_POST["field_article_subject"],
        $_POST["field_article_content"],
        $_POST["field_article_category"],
        $_SESSION['user']) && $_SESSION['user'] instanceof User
) {

    $sTitle = strip_tags($_POST["field_article_subject"]);
    $sContent = strip_tags($_POST["field_article_content"]);
    $sCategory = strip_tags($_POST["field_article_category"]);

    $oCategory = CategoryRepository::find($sCategory);

    $oArticle = new Article($sTitle, $sContent, $oCategory);

    ArticleRepository::save($oArticle);

    $_SESSION['flashes'][] = ['SUCCESS' => 'Article soumis'];

    header('Location: index.php?page=user');

    $_SESSION['flashes'][] = ['ERREUR' => 'Probleme d\'enregistrement'];

    exit;
}
//echo '<pre>';
// print_r($_SESSION);  // Utiliser les info des sessions utilisateur
// print_r($_GET);       // Données contenues dans l'url
// print_r($_POST);      // Données de formulaire
// print_r($_SERVER);    // Données "serveur" créées par php
// print_r($_COOKIE);    // Données cookies fournies par le navigateur
//echo '</pre>';

//if (isset($_POST['field_user_update'], $_SESSION['user']) && $_SESSION['user'] instanceof User){
//
//}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo $sTitle = $_GET['title'] ?? TITLE_HOME; ?>- Mon site</title>
    <meta name="description" content="super blog">
    <link rel="stylesheet" href="css/css/bootstrap.min.css">
</head>
<body class="bg-dark">

<?php

include 'views/header.php';

$sPage = $_GET['page'] ?? PAGE_HOME;
$sFilename = 'views/' . $sPage . '.php';
if (!file_exists($sFilename)) {
    $sFilename = 'views/home.php';
}
include $sFilename;

print_r($_SESSION['flashes']);
$_SESSION['flashes'] = [];

include 'views/footer.php';
?>

<script src="js/js/bootstrap.min.js"></script>
</body>
</html>