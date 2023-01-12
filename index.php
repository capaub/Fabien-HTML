<?php
const PAGE_HOME='home';
const PAGE_CONTACT='contact';

//echo '<pre>';
//print_r($_GET);
//print_r($_POST);
//print_r($_SESSION);
//print_r($_COOKIE);
//print_r($_SERVER);
//echo '</pre>';
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nous contacter - Mon site</title>
    <meta name="description" content="super blog">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'views/header.php';

    //$sPage=isset($_GET['page'])?$_GET['page']:PAGE_HOME;
    $sPage=$_GET['page']??PAGE_HOME;
    $sFilename='views/'.$sPage.'.php';
    if(!file_exists($sFilename)){
        $sFilename='views/home.php';
    }
        include $sFilename;

    include 'views/footer.php';
    ?>
</body>
</html>