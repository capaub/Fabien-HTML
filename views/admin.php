<main>
    <form action="index.php?page=<?php echo PAGE_ADMIN; ?>" method="POST" class="form-example">
        <fieldset>
            <legend>Nouvel article</legend>
            <div>
                <label for="field_subject">Titre</label>
                <input type="text" name="field_subject" id="field_subject" required>
            </div>
            <div>
                <label for="field_content">Votre article</label>
                <textarea name="field_content" id="field_content" cols="30" rows="10"></textarea>
            </div>
            <div>
                <label for="field_type">Catégories</label>
                <select id="field_type" name="field_type">
                    <option value="Higth-Tech">Higth-Tech</option>
                    <option value="Santé">Santé</option>
                    <option value="Auto/Moto">Auto/Moto</option>
                </select>
            </div>
            <div>
                <button>Envoyer</button>
            </div>
        </fieldset>
    </form>
</main>