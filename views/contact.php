<main>
    <form action="?page=<?php echo PAGE_CONTACT; ?>" method="POST" class="form-example">
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
                <label for="field_contact_type">Catégorie</label>
                <select id="field_contact_type" name="field_contact_type">
                    <option>Prioritaire</option>
                    <option>Message libre</option>
                </select>
            </div>
            <div>
                <button name="send_contact">Envoyer</button>
            </div>
        </fieldset>
    </form>
</main>