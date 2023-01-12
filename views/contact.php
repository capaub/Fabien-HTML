<main>
    <form action="" method="POST" class="form-example">
        <fieldset>
            <legend>Formulaire de contact</legend>
            <div>
                <label for="title">Titre</label>
                <input type="text" name="title" id="title" required>
            </div>
            <div>
                <label for="corps">Message</label>
                <textarea name="corps" id="corps" cols="30" rows="10"></textarea>
            </div>
            <div>
                <label for="options">Options de label</label>
                <select id="options" name="options" multiple="Multiple">
                    <option value="classic">Classique</option>
                    <option value="urgent">Prioritaire</option>
                </select>
            </div>
            <div>
                <input type="submit" value="Envoyer">
            </div>
        </fieldset>
    </form>
</main>