<?php
use Blog\Model\User;
?>

<header class="text-center p-3">
    <nav class="">
        <a class="m-2 btn btn-secondary" href="?">Acceuil</a>
        <a class="m-2 btn btn-secondary" href="?page=<?= PAGE_CONTACT; ?>">Me contacter</a>
        <?php if(isset($_SESSION['user']) && $_SESSION['user'] instanceof User) { ?>
            <?php if ($_SESSION['user']->getRole() === User::ROLE_ADMIN): ?>
                <a class="m-2 btn btn-secondary" href="?page=<?= PAGE_ADMIN?>">Espace admin</a>
            <?php endif; ?>
            <a class="m-2 btn btn-secondary" href="?page=<?= PAGE_MY_ACCOUNT?>">Mon compte (<?= $_SESSION['user']->getUsername() ?>)</a>
            <a class="m-2 btn btn-secondary" href="?page=<?= PAGE_LOGOUT?>">Me déconnecter</a>
        <?php } else { ?>
            <a class="m-2 btn btn-secondary" href="?page=<?= PAGE_SIGNUP?>">Inscription</a>
            <a class="m-2 btn btn-secondary" href="?page=<?= PAGE_LOGIN?>">Connexion</a>
        <?php } ?>
    </nav>
</header>

<!--<header class="">-->
<!--    <nav class="nav justify-content-center py-3">-->
<!--        <a class="active rounded-3 btn btn-secondary m-4 px-2 py-1"-->
<!--           href="?">Accueil</a>-->
<!--        <a class=" rounded-3 btn btn-secondary m-4 px-2 py-1"-->
<!--           href="?page=--><?php //echo PAGE_CONTACT; ?><!--">Me contacter</a>-->
<!--        <a class=" rounded-3 btn btn-secondary m-4 px-2 py-1"-->
<!--           href="?page=--><?php //echo PAGE_ARTICLE; ?><!--">Article</a>-->
<!--        --><?php //if (isset($_SESSION['user']) && $_SESSION['user'] instanceof User) { ?>
<!--            --><?php //if ($_SESSION['user']->getRole() === User::ROLE_ADMIN): ?>
<!--                <a class=" rounded-3 btn btn-secondary m-4 px-2 py-1"-->
<!--                   href="?page=--><?php //echo PAGE_ADMIN; ?><!--">Admin</a>-->
<!--            --><?php //endif; ?>
<!--            <a class=" rounded-3 btn btn-secondary m-4 px-2 py-1"-->
<!--               href="?page=--><?php //echo PAGE_MY_ACCOUNT; ?><!--">Mon Compte</a>-->
<!--            <a class=" rounded-3 btn btn-secondary m-4 px-2 py-1"-->
<!--               href="?page=--><?php //echo PAGE_LOGOUT; ?><!--">Déconnexion</a>-->
<!--        --><?php //} else { ?>
<!--            <a class=" rounded-3 btn btn-secondary m-4 px-2 py-1"-->
<!--               href="?page=--><?php //echo PAGE_SIGNUP; ?><!--">Inscription</a>-->
<!--            <a class=" rounded-3 btn btn-secondary m-4 px-2 py-1"-->
<!--               href="?page=--><?php //echo PAGE_LOGIN; ?><!--">Login</a>-->
<!--        --><?php //} ?>
<!--    </nav>-->
<!--</header>-->