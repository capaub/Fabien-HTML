<?php

// Require the Composer autoloader, if not already loaded
require 'vendor/autoload.php';

use DebugBar\StandardDebugBar;

$oDebugbar = new StandardDebugBar();
$oDebugbarRenderer = $oDebugbar->getJavascriptRenderer('vendor/maximebf/debugbar/src/DebugBar/Resources');

$oDebugbar["messages"]->addMessage('hello world!');
?>

</html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $seo_title ?? '' ?> - Mon site</title>
    <meta name="description" content="super blog">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/css/bootstrap.min.css">
    <?php echo $oDebugbarRenderer->renderHead() ?>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
</head>
<body class="bg-dark">

<?php

include 'header.php';

foreach ($_SESSION['flashes'] as $iIdx => $aMessages){
    foreach ($aMessages as $sType => $sMessage) {
        echo '<div class="alert aler-'. $sType . '">'.$sMessage.'</div>';
    }
}
$_SESSION['flashes'] = [];

if (file_exists('views/' . $sView)) {
    include $sView;
}

include 'footer.php';
?>
<?php echo $oDebugbarRenderer->render() ?>
<script src="js/js/bootstrap.min.js"></script>
</body>
</html>