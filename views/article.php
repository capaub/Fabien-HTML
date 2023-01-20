<main>
    <form action="?page=<?php echo TITLE_ARTICLES; ?>" method="POST" class="form_article">
        <fieldset>
            <legend>Nouvel article</legend>
            <div>
                <label for="field_article_subject">Titre</label>
                <input type="text" name="field_article_subject" id="field_article_subject" required>
            </div>
            <div>
                <label for="field_article_content">Votre article</label>
                <textarea name="field_article_content" id="field_article_content" cols="30" rows="10"></textarea>
            </div>
            <div>
                <label for="field_article_type">Catégories</label>
                <select id="field_article_type" name="field_article_type">
                    <?php foreach($aCats as $cat)
                        {?>
                        <option value="<?php echo $cat->getName()?>"><?php echo $cat->getName()?></option>
                        <?php }
                    ?>
                </select>
            </div>
            <div>
                <button>Envoyer</button>
            </div>
        </fieldset>
    </form>
</main>