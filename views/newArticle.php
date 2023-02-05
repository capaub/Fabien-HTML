<?php

use Blog\Repository\CategoryRepository;

$aCats = CategoryRepository::findAll();

?>

<main>
    <form class="container" action="?page=<?php echo PAGE_NEW_ARTICLE; ?>" method="POST" class="form_article">
        <fieldset class="row">
            <legend class="col-8">Nouvel article</legend>
            <div>
                <label for="field_article_subject">Titre</label>
                <input type="text" name="field_article_subject" id="field_article_subject" required>
            </div>
            <div>
                <label for="field_article_content">Votre article</label>
                <textarea name="field_article_content" id="field_article_content" cols="30" rows="10" required></textarea>
            </div>
            <div>
                <label for="field_article_type">Catégories</label>
                <select id="field_article_type" name="field_article_type">
                    <?php foreach($aCats as $oCat) : ?>
                        <option value="<?php echo $oCat->getName() ?>"><?php echo $oCat->getName() ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <button>Envoyer</button>
            </div>
        </fieldset>
    </form>
</main>