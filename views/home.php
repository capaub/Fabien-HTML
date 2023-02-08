<main>
    <h1>Mon blog</h1>
    <?php
    foreach ($articles as $oArticle) {
        echo '<hr />';
        echo '<a href="?=page'.PAGE_ARTICLE.'&article='.$oArticle->getId().'" title="Accéder à l\article complet">';
        echo    '<h2>'.$oArticle->getTitle().'</h2>';
        echo '</a>';
        echo '<strong>Catégorie : '.$oArticle->getCategory()->getName().'</strong>';
        echo '<em>Créer le : '.$oArticle->getCreatedAt()->format('d/m/Y').'</em>';
    }
    ?>
</main>

<!--<main class="container">-->
<!--    <h1 class="text-center text-white">Mon Blog</h1>-->
<!---->
<!---->
<!--    <div class="row justify-content-center">-->
<!--<!--        -->--><?php ////foreach ($article as $oArticle) : ?>
<!--            <article class="col-3 bg-light rounded-1 m-3 p-4 container">-->
<!--                <a href="?page=--><?php //= PAGE_ARTICLE ?><!--&article=--><?php //= $oArticle->getId()?><!--">-->
<!--                    <h4>--><?php //= $oArticle->getTitle() ?><!--</h4>-->
<!--                </a>-->
<!--                <ul class="align-content-around">-->
<!--                    <li class="col-12 list-unstyled">Catégorie : --><?php //= $article->getCategory()->getName() ?><!--</li>-->
<!--                    <li class="col-6 list-unstyled">Status : --><?php //= $article::STATUS[$article->getStatus()] ?><!--</li>-->
<!--                    <li class="col-6 list-unstyled">Date de créationn : --><?php //= $article->getCreatedAt()->format('Y-m-d') ?><!--</li>-->
<!--                </ul>-->
<!--            </article>-->
<!--<!--        -->--><?php ////endforeach; ?>
<!--    </div>-->
<!--</main>-->