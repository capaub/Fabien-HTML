<?php

use Blog\Repository\ArticleRepository;
use Blog\Model\User;

$aArticles = ArticleRepository::findAll();
?>

<section class="container p-0">
    <?php if(isset($_SESSION['user']) && $_SESSION['user'] instanceof User){?>
        <nav class="row">
            <a class=" text-center col-2 offset-9 p-2 my-2 bg-light-subtle rounded-2" href="?page=<?php echo PAGE_NEW_ARTICLE?>&title=<?php echo TITLE_NEW_ARTICLE?>">Déposer un article</a>
        </nav>
    <?php } ?>
    <?php foreach ($aArticles as $oArticle) : ?>
        <?php if(isset($_SESSION['user']) && $_SESSION['user'] instanceof User && $_SESSION['user']->getRole() == $_SESSION['user']::ROLE_ADMIN) { ?>
            <article class="col-10 offset-1 bg-light rounded-1 my-4 p-3">
                <div class="">
                    <h2 class=""><?= $oArticle->getTitle() ?></h2>
                    <ul class="row">
                        <li class="col-4 list-unstyled">Catégorie : <?= $oArticle->getCategory()->getName() ?></li>
                        <li class="col-4 list-unstyled">Status : <?= $oArticle::STATUS[$oArticle->getStatus()] ?></li>
                        <li class="col-4 list-unstyled">Date de création : <?= $oArticle->getCreatedAt()->format('Y-m-d') ?></li>
                    </ul>
                    <p class="align-items-center px-5"><?= $oArticle->getContent() ?></p>
                </div>
            </article>
        <?php } ?>
        <?php if($oArticle::STATUS[$oArticle->getStatus()] === "Publié") {
            ?>
            <article class="col-10 offset-1 bg-light rounded-1 my-4 p-3">
                <div class="">
                    <h2 class=""><?= $oArticle->getTitle() ?></h2>
                    <ul class="row">
                        <li class="col-4 list-unstyled">Catégorie : <?= $oArticle->getCategory()->getName() ?></li>
                        <li class="col-4 list-unstyled">Status : <?= $oArticle::STATUS[$oArticle->getStatus()] ?></li>
                        <li class="col-4 list-unstyled">Date de création : <?= $oArticle->getCreatedAt()->format('Y-m-d') ?></li>
                    </ul>
                    <p class="align-items-center px-5"><?= $oArticle->getContent() ?></p>
                </div>
            </article>
        <?php } ?>
    <?php endforeach ?>
</section>
