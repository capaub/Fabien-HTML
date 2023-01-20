<?php

require_once 'lib/config.php';
require_once 'function.php';
require_once 'Model/Article.php';
require_once 'Model/Category.php';

$oCat1 = new Category("Auto/Moto");
$oCat2 = new Category("Higth-Tech");
$oCat3 = new Category("Santé");

 $aCats=[
    $oCat1,
    $oCat2,
    $oCat3,
];

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
    <title><?php echo $sTitle=$_GET['title']??TITLE_HOME; ?>- Mon site</title>
    <meta name="description" content="super blog">
    <link rel="stylesheet" href="css/style.scss">
</head>
<body>

    <?php include 'views/header.php';

    /*
    if(isset($_POST["field_contact_subject"],$_POST["field_contact_content"])) {
        $sCleanCategory = filter_input(INPUT_POST,'field_subject',FILTER_SANITIZE_STRING);
        $sCleanSubject = filter_var($_POST['field_subject'],FILTER_SANITIZE_STRING);
        $sCleanContent = filter_var($_POST['field_content'],FILTER_SANITIZE_STRING);


        sendMail(MAIL_ADMIN, $_POST["field_contact_subject"], $_POST["field_contact_content"]);
    }*/

    if(isset($_POST["field_article_subject"],$_POST["field_article_content"],$_POST["field_article_type"])) {

        foreach($aCats as $oCat)
        {
            if($_POST["field_article_type"] == $oCat->getName())
            {
                $oArticle = new Article($_POST["field_article_subject"], $_POST["field_article_content"], $oCat);
                saveArticle($oArticle);
                break;
            }
        }

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