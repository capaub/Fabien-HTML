<main>
    <form action="?page=<?php echo PAGE_USER; ?>" method="POST" class="form_user">
        <fieldset>
            <legend>Création d'un compte utilisateur</legend>
            <div>
                <label for="field_article_username">UserName</label>
                <input type="text" name="field_article_username" id="field_article_username" required>
            </div>
            <div>
                <label for="field_article_email">Email</label>
                <input type="email" name="field_article_email" id="field_article_email" required>
            </div>
            <div>
                <label for="field_article_birthdate">Birthdate</label>
                <input type="date" name="field_article_birthdate" id="field_article_birthdate" required>
            </div>
            <div>
                <label for="field_article_password">Password</label>
                <input type="password" name="field_article_password" id="field_article_password" required>
            </div>
            <div>
                <button>Envoyer</button>
            </div>
        </fieldset>
    </form>
</main>