<?php

use Blog\Repository\ArticleRepository;
use Blog\Model\User;

$aArticles = ArticleRepository::findAll();
?>

<section class="container">
    <?php if(isset($_SESSION['user']) && $_SESSION['user'] instanceof User){?>
    <nav class="row">
        <a class=" text-center col-4 offset-8 p-2 my-2 bg-light-subtle rounded-2" href="?page=<?php echo PAGE_NEW_ARTICLE?>&title=<?php echo TITLE_NEW_ARTICLE?>">Déposer un article</a>
    </nav>
    <?php } ?>
    <?php foreach ($aArticles as $oArticle) : ?>
    <article class="row bg-light rounded-1 my-4 p-3">
        <div class="">
            <h2 class=""><?= $oArticle->getTitle() ?></h2>
                <ul class="row align-content-around">
                    <li class="col-12 list-unstyled">Catégorie : <?= $oArticle->getCategory()->getName() ?></li>
                    <li class="col-6 list-unstyled">Status : <?= $oArticle->getStatus() ?></li>
                    <li class="col-6 list-unstyled">Date de création : <?= $oArticle->getCreatedAt()->format('Y-m-d') ?></li>
                </ul>
            <p class="align-items-center px-5"><?= $oArticle->getContent() ?></p>
        </div>
    </article>
    <?php endforeach;?>
</section>