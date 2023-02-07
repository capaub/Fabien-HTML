<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $seo_title ?? '' ?>- Mon site</title>
    <meta name="description" content="super blog">
    <link rel="stylesheet" href="css/css/bootstrap.min.css">
</head>
<body class="bg-dark">

<?php

include 'header.php';

if (file_exists('view/' . $sView)) {
    include $sView;
}

//foreach ($_SESSION['flashes'] as $iIndx => $sMessages)
//{
//    foreach ($sMessages as $sType => $sMessage)
//    {
//        echo '<div></div>';
//    }
//};
include 'footer.php';
?>

<script src="js/js/bootstrap.min.js"></script>
</body>
</html>