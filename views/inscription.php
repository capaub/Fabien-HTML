<main>
    <form action="?page=<?php echo PAGE_SIGNUP; ?>" method="POST" class="form_user">
        <fieldset>
            <legend>Création d'un compte utilisateur</legend>
            <div>
                <label for="field_username">Nom d'utilisateur</label>
                <input type="text" name="field_username" id="field_username" required>
            </div>
            <div>
                <label for="field_email">Email</label>
                <input type="email" name="field_email" id="field_email" required>
            </div>
            <div>
                <label for="field_birthdate">Date de naissance</label>
                <input type="date" name="field_birthdate" id="field_birthdate" required>
            </div>
            <div>
                <label for="field_password">Password</label>
                <input type="password" name="field_password" id="field_password" required>
            </div>
            <div>
                <label for="field_street">Nom de la rue</label>
                <input type="text" name="field_street" id="field_street" required>
            </div>
            <div>
                <label for="field_postalCode">Code Postal</label>
                <input type="number" minlength="5" maxlength="5" name="field_postalCode" id="field_postalCode" required>
            </div>
            <div>
                <label for="field_city">Ville</label>
                <input type="text" name="field_city" id="field_city" required>
            </div>
            <div>
                <label for="field_country">Pays</label>
                <input type="text" name="field_country" id="field_country" required>
            </div>
            <div>
                <button>Inscription</button>
            </div>
        </fieldset>
    </form>
</main>