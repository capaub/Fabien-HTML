<?php

use Blog\Model\User;

?>

<header class="">
    <nav class="nav justify-content-center py-3">
        <a class="nav-link rounded-3 bg-light-subtle m-4 px-2 py-1" href="?page=<?php echo PAGE_HOME; ?>&title=<?php echo TITLE_HOME; ?>">Accueil</a>
        <a class="nav-link rounded-3 bg-light-subtle m-4 px-2 py-1" href="?page=<?php echo PAGE_CONTACT; ?>&title=<?php echo TITLE_CONTACT; ?>">Contact</a>
        <a class="nav-link rounded-3 bg-light-subtle m-4 px-2 py-1" href="?page=<?php echo PAGE_ARTICLES; ?>&title=<?php echo TITLE_ARTICLES; ?>">Article</a>
        <?php if (isset($_SESSION['user']) && $_SESSION['user'] instanceof User) {?>
            <?php if ($_SESSION['user']->getRole() === User::ROLE_ADMIN): ?>
            <a class="nav-link rounded-3 bg-light-subtle m-4 px-2 py-1" href="?page=<?php echo PAGE_ADMIN; ?>&title=<?php echo TITLE_ADMIN; ?>">Admin</a>
            <?php endif; ?>
            <a class="nav-link rounded-3 bg-light-subtle m-4 px-2 py-1" href="?page=<?php echo PAGE_USER; ?>&title=<?php echo TITLE_USER; ?>">Mon Compte</a>
            <a class="nav-link rounded-3 bg-light-subtle m-4 px-2 py-1" href="?action=logout">Déconnexion</a>
        <?php } else { ?>
            <a class="nav-link rounded-3 bg-light-subtle m-4 px-2 py-1" href="?page=<?php echo PAGE_SIGNUP; ?>&title=<?php echo TITLE_SIGNUP; ?>">Inscription</a>
            <a class="nav-link rounded-3 bg-light-subtle m-4 px-2 py-1" href="?page=<?php echo PAGE_LOGIN; ?>&title=<?php echo TITLE_LOGIN; ?>">Login</a>
        <?php } ?>
    </nav>
</header>