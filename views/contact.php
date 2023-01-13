<main>
    <form action="index.php?page=<?php echo PAGE_CONTACT; ?>" method="POST" class="form-example">
        <fieldset>
            <legend>Formulaire de contact</legend>
            <div>
                <label for="field_contact_subject">Titre</label>
                <input type="text" name="field_contact_subject" id="field_contact_subject" required>
            </div>
            <div>
                <label for="field_contact_content">Message</label>
                <textarea name="field_contact_content" id="field_contact_content" cols="30" rows="10"></textarea>
            </div>
            <div>
                <label for="field_contact_options">Options de label</label>
                <select id="field_contact_options" name="field_contact_options" multiple="Multiple">
                    <option value="classic">Classique</option>
                    <option value="urgent">Prioritaire</option>
                </select>
            </div>
            <div>
                <button name="send_contact">Envoyer</button>
            </div>
        </fieldset>
    </form>
</main>