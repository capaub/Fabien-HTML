<?php

require 'config.php';
require 'function.php';

echo '<pre>';
// print_r($_SESSION);  // Utiliser les info des sessions utilisateur
// print_r($_GET);       // Données contenues dans l'url
// print_r($_POST);      // Données de formulaire
// print_r($_SERVER);    // Données "serveur" créées par php
// print_r($_COOKIE);    // Données cookies fournies par le navigateur
echo '</pre>';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo $sTitle=$_GET['title']??TITLE_HOME; ?>- Mon site</title>
    <meta name="description" content="super blog">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <?php include 'views/header.php';

    if(isset($_POST["field_contact_subject"],$_POST["field_contact_content"])) {
        sendMail(MAIL_ADMIN, $_POST["field_contact_subject"], $_POST["field_contact_content"]);
    }

    if(isset($_POST["field_subject"],$_POST["field_content"],$_POST["field_type"])) {
        $aArticle = [
            "subject" => $_POST["field_subject"],
            "content" => $_POST["field_content"],
            "type" => $_POST["field_type"],
        ];
        saveArticle($aArticle);
    }

    $sPage=$_GET['page']??PAGE_HOME;
    $sFilename='views/'.$sPage.'.php';
    if(!file_exists($sFilename)){
        $sFilename='views/home.php';
    }
    include $sFilename;

    include 'views/footer.php';
    ?>
<script src="js/script.js"></script>
</body>
</html>