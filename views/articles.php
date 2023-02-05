<?php

use Blog\Repository\ArticleRepository;

$aArticles = ArticleRepository::findAll();
?>

<section class="container">
    <nav class="nav">
        <a class="nav-link p-2 m-2 bg-light-subtle rounded-2" href="?page=<?php echo PAGE_NEW_ARTICLE?>&title=<?php echo TITLE_NEW_ARTICLE?>">Déposer un article</a>
    </nav>
    <?php foreach ($aArticles as $oArticle) : ?>
    <article class="row bg-light rounded-1 my-4 p-3">
        <div class="position-relative">
            <h2 class=""><?= $oArticle->getTitle() ?></h2>
                <ul class="row align-content-around">
                    <li class="col-12 list-unstyled">Catégorie : <?= $oArticle->getCategory()->getName() ?></li>
                    <li class="col-6 list-unstyled position-absolute bottom-0 start-0">Status : <?= $oArticle->getStatus() ?></li>
                    <li class="col-6 list-unstyled position-absolute bottom-0 end-0 text-end m-2">Date de création : <?= $oArticle->getCreatedAt()->format('Y-m-d') ?></li>
                </ul>
            <p class="align-items-center px-5"><?= $oArticle->getContent() ?></p>
        </div>
    </article>
    <?php endforeach;?>
</section>