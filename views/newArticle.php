<?php

use Blog\Repository\CategoryRepository;

$aCats = CategoryRepository::findAll();

?>

<main>
    <form class="container" action="?page=<?php echo PAGE_NEW_ARTICLE; ?>" method="POST" class="form_article">
        <fieldset class="row">
            <legend class="text-center text-white">Votre article</legend>
            <div class="row">
                <label class="col-8 offset-2 text-white" for="field_article_subject">Titre</label>
                <input class="col-8 offset-2" type="text" name="field_article_subject" id="field_article_subject" required>
            </div>
            <div class="row">
                <label class="col-8 offset-2 text-white" for="field_article_content">Votre article</label>
                <textarea class="col-8 offset-2" name="field_article_content" id="field_article_content" cols="30" rows="10" required></textarea>
            </div>
            <div class="row">
                <label  class="col-8 offset-2 text-white" for="field_article_type">Catégories</label>
                <select class="col-5 offset-2" id="field_article_type" name="field_article_type">
                    <?php foreach($aCats as $oCat) : ?>
                        <option value="<?php echo $oCat->getName() ?>"><?php echo $oCat->getName() ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="row">
                <button class="col-3 offset-2 my-2">Envoyer</button>
            </div>
        </fieldset>
    </form>
</main>