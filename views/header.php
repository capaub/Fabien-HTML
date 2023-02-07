<?php

use Blog\Model\User;

?>

<header class="">
    <nav class="nav justify-content-center py-3">
        <a class=" rounded-3 btn btn-secondary m-4 px-2 py-1"
           href="?page=<?php echo PAGE_HOME; ?>">Accueil</a>
        <a class=" rounded-3 btn btn-secondary m-4 px-2 py-1"
           href="?page=<?php echo PAGE_CONTACT; ?>">Contact</a>
        <a class=" rounded-3 btn btn-secondary m-4 px-2 py-1"
           href="?page=<?php echo PAGE_ARTICLES; ?>">Article</a>
        <?php if (isset($_SESSION['user']) && $_SESSION['user'] instanceof User) { ?>
            <?php if ($_SESSION['user']->getRole() === User::ROLE_ADMIN): ?>
                <a class=" rounded-3 btn btn-secondary m-4 px-2 py-1"
                   href="?page=<?php echo PAGE_ADMIN; ?>">Admin</a>
            <?php endif; ?>
            <a class=" rounded-3 btn btn-secondary m-4 px-2 py-1"
               href="?page=<?php echo PAGE_MY_ACCOUNT; ?>">Mon Compte</a>
            <a class=" rounded-3 btn btn-secondary m-4 px-2 py-1"
               href="?page=<?php echo PAGE_LOGOUT; ?>">Déconnexion</a>
        <?php } else { ?>
            <a class=" rounded-3 btn btn-secondary m-4 px-2 py-1"
               href="?page=<?php echo PAGE_REGISTER; ?>">Inscription</a>
            <a class=" rounded-3 btn btn-secondary m-4 px-2 py-1"
               href="?page=<?php echo PAGE_LOGIN; ?>">Login</a>
        <?php } ?>
    </nav>
</header>