<?php

use Blog\Model\User;

if(!isset($_SESSION['user']) || !$_SESSION['user'] instanceof User){
    header('Location: index.php?page=home');
    exit;
};
?>

<h1>Mon compte</h1>
<div>
    <p>Compte créer le <?php echo $_SESSION['user']->getCreatedAt()->format('d/m/Y H:i');   ?></p>
    <p>Nom d'utilisateur : <?php echo $_SESSION['user']->getUserName();   ?></p>
    <p>Email : <?php echo $_SESSION['user']->getEmail();   ?></p>
    <p>Role : <?php echo $_SESSION['user']::ROLE_CONF[$_SESSION['user']->getRole()]['name'];   ?></p>
</div>

<!--//use Blog\Repository\UserRepository;-->
<!--//-->
<!--//$oUsers = UserRepository::findAll();-->
<!--//foreach ($oUsers as $oUser) {-->
<!--//echo '<div style="width: 60%">' .-->
<!--//    '<p>Username : ' . $oUser->getUserName() . '</p>' .-->
<!--//    '<p>Adresse mail : ' . $oUser->getEmail() . '</p>' .-->
<!--//    //'<p>Date de naissance : '.$oUser->getBirthAt().'</p>'.-->
<!--//    //'<p>Date de création : '.$oUser->getCreateAt().'</p>'.-->
<!--//    '<p class="address">Adresse</p>' .-->
<!--//    '</hr>' .-->
<!--//    '<p>Nom de la rue : ' . $oUser->getAddress()->getStreet() . '</p>' .-->
<!--//    '<p>Ville : ' . $oUser->getAddress()->getCity() . '</p>' .-->
<!--//    '<p>Code postal : ' . $oUser->getAddress()->getPostalCode() . '</p>' .-->
<!--//    '<p>Pays : ' . $oUser->getAddress()->getCountry() . '</p></div>';-->
<!--//}-->