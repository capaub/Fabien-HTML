<?php


use Blog\Model\Article;

?>

<main class="container">
    <h1 class="text-center text-white">Mon Blog</h1>

    <nav class="row">
        <a class=" text-center col-2 offset-9 p-2 my-2 bg-light-subtle rounded-2"
           href="?page=<?php echo PAGE_NEW_ARTICLE ?>">Déposer un article</a>
    </nav>
    <div class="row justify-content-center">
            <article class=" bg-light rounded-1 m-3 p-4 container">
                <form method="POST" enctype="multipart/form-data">
                    <h4><?= $article->getTitle();?></h4>
                    <div>
                        <label for="picture">Picture</label>
                        <input id="picture" type="file" name="file_picture">
                    </div>
                    <ul class="align-content-around">
                        <li class="col-12 list-unstyled">Catégorie : <?= $article->getCategory()->getName() ?></li>
                        <li class="col-6 list-unstyled">Status : <?= Article::STATUS[$article->getStatus()] ?></li>
                        <li class="col-6 list-unstyled">Date de créationn : <?= $article->getCreatedAt()->format('Y-m-d') ?></li>
                        <p class="align-items-center px-5"><?= $article->getContent() ?></p>
                    </ul>
                </form>
            </article>
    </div>
</main>