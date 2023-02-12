<main class="container flex-wrap">
    <div class="row">
        <h1 class="text-white"><?= $article->getTitle(); ?></h1>
        <strong class="text-white"><?= $article->getCategory()->getName(); ?></strong><br />
        <em class="text-white"><?= $article->getCreatedAt()->format('d/m/Y'); ?></em>
        <p class="text-white"><?= $article->getContent(); ?></p>

        <?php if($article->getPicture()) { ?>
            <img src="<?= DIR_UPLOADS . DIRECTORY_SEPARATOR . $article->getPicture(); ?>"
                 alt=" Illustration" />
        <?php } ?>
    </div>
</main>

<!--<section class="container p-0">-->
<!---->
<!--    --><?php //use Blog\Model\User;
//
//    if (isset($_SESSION['user']) && $_SESSION['user'] instanceof User) { ?>
<!--        <nav class="row">-->
<!--            <a class=" text-center col-2 offset-9 p-2 my-2 bg-light-subtle rounded-2"-->
<!--               href="?page=--><?php //echo PAGE_NEW_ARTICLE ?><!--">Déposer un article</a>-->
<!--        </nav>-->
<!--    --><?php //} ?>
<!--            <article class="col-10 offset-1  bg-secondary rounded-1 my-4 p-3">-->
<!--                <div class="">-->
<!--                    <h2 class="">--><?php //= $article->getTitle() ?><!--</h2>-->
<!--                    <ul class="row">-->
<!--                        <li class="col-4 list-unstyled">Catégorie : --><?php //= $article->getCategory()->getId() ?><!--</li>-->
<!--                        <li class="col-4 list-unstyled">Status : --><?php //= $article::STATUS[$article->getStatus()] ?><!--</li>-->
<!--                        <li class="col-4 list-unstyled">Date de création-->
<!--                            : --><?php //= $article->getCreatedAt()->format('Y-m-d') ?><!--</li>-->
<!--                    </ul>-->
<!--                    <p class="align-items-center px-5">--><?php //= $article->getContent() ?><!--</p>-->
<!--                </div>-->
<!--            </article>-->
<!--        --><?php //if ($article::STATUS[$article->getStatus()] === "Publié") { ?>
<!--            <article class="col-10 offset-1  bg-secondary rounded-1 my-4 p-3">-->
<!--                <div class="">-->
<!--                    <h2 class="">--><?php //= $article->getTitle() ?><!--</h2>-->
<!--                    <ul class="row">-->
<!--                        <li class="col-4 list-unstyled">Catégorie : --><?php //= $article->getCategory()->getName() ?><!--</li>-->
<!--                        <li class="col-4 list-unstyled">Status : --><?php //= $article::STATUS[$article->getStatus()] ?><!--</li>-->
<!--                        <li class="col-4 list-unstyled">Date de création-->
<!--                            : --><?php //= $article->getCreatedAt()->format('Y-m-d') ?><!--</li>-->
<!--                    </ul>-->
<!--                    <p class="align-items-center px-5">--><?php //= $article->getContent() ?><!--</p>-->
<!--                </div>-->
<!--            </article>-->
<!--        --><?php //} ?>
<!--</section>-->