<main>
    <form class="container" action="?page=<?php echo PAGE_SIGNUP; ?>" method="POST">
        <fieldset class="row" >
            <legend class="text-center text-white">Création d'un compte utilisateur</legend>
            <div class="row">
                <label class="col-8 offset-2 text-white" for="field_signup_username">Nom d'utilisateur</label>
                <input class="col-8 offset-2" type="text" name="field_signup_username" id="field_signup_username"
                       required>
            </div>
            <div class="row">
                <label class="col-8 offset-2 text-white" for="field_signup_email">Email</label>
                <input class="col-8 offset-2" type="email" name="field_signup_email" id="field_signup_email" required>
            </div>
            <div class="row">
                <label class="col-8 offset-2 text-white" for="field_signup_birthdate">Date de naissance</label>
                <input class="col-8 offset-2" type="date" name="field_signup_birthdate" id="field_signup_birthdate"
                       required>
            </div>
            <div class="row">
                <label class="col-8 offset-2 text-white" for="field_signup_password">Password</label>
                <input class="col-8 offset-2" type="password" name="field_signup_password" id="field_signup_password"
                       required>
            </div>
            <div class="row">
                <label class="col-8 offset-2 text-white" for="field_signup_street">Nom de la rue</label>
                <input class="col-8 offset-2" type="text" name="field_signup_street" id="field_signup_street" required>
            </div>
            <div class="row">
                <div class="col-3 offset-2 ps-0">
                    <label class="col-12 text-white" for="field_signup_postalCode">Code Postal</label>
                    <input class="col-12" type="number" minlength="5" maxlength="5" name="field_signup_postalCode" id="field_signup_postalCode"
                           required>
                </div>
                <div class="col-5 pe-0">
                    <label class="col-12 text-white" for="field_signup_city">Ville</label>
                    <input class="col-12" type="text" name="field_signup_city" id="field_signup_city" required>
                </div>
            </div>
            <div class="row">
                <label class="col-8 offset-2 text-white" for="field_signup_country">Pays</label>
                <input class="col-8 offset-2" type="text" name="field_signup_country" id="field_signup_country" required>
            </div>
            <div class="row">
                <button class="col-3 offset-2 my-2">Inscription</button>
            </div>
        </fieldset>
    </form>
</main>