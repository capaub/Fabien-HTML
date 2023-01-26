<main>
    <form action="?page=<?php echo PAGE_LOGIN; ?>" method="POST" class="form_login">
        <fieldset>
            <legend>Connexion</legend>
            <div>
                <label for="field_article_login_username">UserName</label>
                <input type="text" name="field_article_login_username" id="field_article_login_username" required>
            </div>
            <div>
                <label for="field_article_login_password">Password</label>
                <input type="password" name="field_article_login_password" id="field_article_login_password" required>
            </div>
            <div>
                <button>Connexion</button>
            </div>
        </fieldset>
    </form>
</main><?php
