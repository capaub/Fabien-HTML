<?php

use Blog\Repository\CategoryRepository;

$aCats = CategoryRepository::findAll();

?>

<main>
    <form class="container" method="POST">
        <fieldset class="row">
            <legend class="text-center text-white">Votre article</legend>
            <div class="row">
                <label class="col-8 offset-2 text-white" for="field_article_subject">Titre</label>
                <input class="col-8 offset-2 bg-secondary" type="text" name="field_article_subject"
                       id="field_article_subject"
                       required>
            </div>
            <div class="row">
                <label class="col-8 offset-2 text-white" for="field_article_content">Votre article</label>
                <textarea class="col-8 offset-2 bg-secondary" name="field_article_content" id="field_article_content"
                          cols="30"
                          rows="10" required></textarea>
            </div>
            <div class="row">
                <label class="col-8 offset-2 text-white" for="field_article_category">Catégories</label>
                <select class="col-5 offset-2 bg-secondary" id="field_article_category" name="field_article_category">
                    <?php foreach ($aCats as $oCat) : ?>
                        <option value="<?php echo $oCat->getId() ?>"><?php echo $oCat->getName() ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-3 offset-2 py-3">
                <button type="button" class=" btn btn-secondary">Envoyer</button>
            </div>
        </fieldset>
    </form>
</main>