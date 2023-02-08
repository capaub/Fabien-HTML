<?php

use Blog\Model\User;

if (!isset($_SESSION['user']) || !$_SESSION['user'] instanceof User) {
    header('Location: index.php?page=home');
    exit;
}

?>

<main class="container">
    <h1 class="text-white text-center">Mon compte</h1>
    <em class="text-white text-center">Compte créé le <?= $_SESSION['user']->getCreatedAt()->format('d/m/Y H:i') ?></em>

    <div>
        <strong class="text-white text-center">Mes données</strong>
        <table class="row">
            <tr class="col-4">
                <td class="text-white text-center">Nom d'utilisateur</td>
                <td class="text-white text-center"><?= $_SESSION['user']->getUserName(); ?></td>
            </tr>
            <tr class="col-4">
                <td class="text-white text-center">Email</td>
                <td class="text-white text-center"><?= $_SESSION['user']->getEmail(); ?></td>
            </tr>
            <tr class="col-4">
                <td class="col-12 text-white text-center">Rôle</td>
                <td class="col-12 text-white text-center"><?= User::ROLE_CONF[$_SESSION['user']->getRole()]['label']; ?></td>
            </tr>
        </table>
    </div>
</main>

<!--<main class="container">-->
<!--    <h1 class="text-white text-center">Mon compte</h1>-->
<!--    <div>-->
<!--        <em class="text-white offset-2">Compte créer le --><?php //echo $_SESSION['user']->getCreatedAt()->format('d/m/Y'); ?><!--</em>-->
<!--        <p class="text-white offset-2">Nom d'utilisateur : --><?php //echo $_SESSION['user']->getUserName(); ?><!--</p>-->
<!--        <p class="text-white offset-2">Email : --><?php //echo $_SESSION['user']->getEmail(); ?><!--</p>-->
<!--        <p class="text-white offset-2">Role-->
<!--            : --><?php //echo $_SESSION['user']::ROLE_CONF[$_SESSION['user']->getRole()]['name']; ?><!--</p>-->
<!--    </div>-->
<!--    <button class="text-center offset-9" value="field_user_update">Modifier</button>-->
<!--</main>-->

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