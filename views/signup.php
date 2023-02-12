<main class="container">
    <h1 class="text-white text-center">Formulaire d'inscription</h1>
    <form class="row" action="?page=<?=PAGE_SIGNUP; ?>" method="POST">
        <div class="row">
            <label class="col-8 offset-2 text-white my-2 px-2" for="username">Pseudo</label>
            <input class="col-8 offset-2 bg-secondary" required type="text" id="username" name="field_username">
        </div>
        <div class="row">
            <label class="col-8 offset-2 text-white my-2 px-2" for="email">Email</label>
            <input class="col-8 offset-2 bg-secondary" required type="email" id="email" name="field_email">
        </div>
        <div class="row">
            <label class="col-8 offset-2 text-white my-2 px-2" for="password">Mot de passe</label>
            <input class="col-8 offset-2 bg-secondary" required type="password" id="password" name="field_password">
        </div>
        <div class="row">
            <label class="col-8 offset-2 text-white my-2 px-2" for="birthAt">Date de naissance</label>
            <input class="col-8 offset-2 bg-secondary" required type="date" id="birthAt" name="field_birthAt">
        </div>
        <div class="row">
        <button class="col-3 offset-2 bg-secondary text-white my-3 px-0" name="form_signup" value="signup">Envoyer</button>
        </div>
    </form>
</main>

<!--<main>-->
<!--    <form class="container" method="POST">-->
<!--        <fieldset class="row">-->
<!--            <legend class="text-center text-white">Création d'un compte utilisateur</legend>-->
<!--            <div class="row">-->
<!--                <label class="col-8 offset-2 text-white my-2 px-2" for="field_signup_username">Nom d'utilisateur</label>-->
<!--                <input class="col-8 offset-2 bg-secondary" type="text" name="field_signup_username"-->
<!--                       id="field_signup_username"-->
<!--                       required>-->
<!--            </div>-->
<!--            <div class="row">-->
<!--                <label class="col-8 offset-2 text-white my-2 px-2" for="field_signup_email">Email</label>-->
<!--                <input class="col-8 offset-2 bg-secondary" type="email" name="field_signup_email"-->
<!--                       id="field_signup_email" required>-->
<!--            </div>-->
<!--            <div class="row">-->
<!--                <label class="col-8 offset-2 text-white my-2 px-2" for="field_signup_birthdate">Date de-->
<!--                    naissance</label>-->
<!--                <input class="col-8 offset-2 bg-secondary" type="date" name="field_signup_birthdate"-->
<!--                       id="field_signup_birthdate"-->
<!--                       required>-->
<!--            </div>-->
<!--            <div class="row">-->
<!--                <label class="col-8 offset-2 text-white my-2 px-2" for="field_signup_password">Password</label>-->
<!--                <input class="col-8 offset-2 bg-secondary" type="password" name="field_signup_password"-->
<!--                       id="field_signup_password"-->
<!--                       required>-->
<!--            </div>-->
<!--            <div class="row">-->
<!--                <label class="col-8 offset-2 text-white my-2 px-2" for="field_signup_street">Nom de la rue</label>-->
<!--                <input class="col-8 offset-2 bg-secondary" type="text" name="field_signup_street"-->
<!--                       id="field_signup_street" required>-->
<!--            </div>-->
<!--            <div class="row">-->
<!--                <div class="col-3 offset-2 ps-0">-->
<!--                    <label class="col-12 text-white my-2 px-2" for="field_signup_postalCode">Code Postal</label>-->
<!--                    <input class="col-12 bg-secondary" type="number" minlength="5" maxlength="5"-->
<!--                           name="field_signup_postalCode" id="field_signup_postalCode"-->
<!--                           required>-->
<!--                </div>-->
<!--                <div class="col-5 pe-0">-->
<!--                    <label class="col-12 text-white my-2 px-2" for="field_signup_city">Ville</label>-->
<!--                    <input class="col-12 bg-secondary" type="text" name="field_signup_city" id="field_signup_city"-->
<!--                           required>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="row">-->
<!--                <label class="col-8 offset-2 text-white my-2 px-2" for="field_signup_country">Pays</label>-->
<!--                <input class="col-8 offset-2 bg-secondary" type="text" name="field_signup_country"-->
<!--                       id="field_signup_country"-->
<!--                       required>-->
<!--            </div>-->
<!--            <div class="row my-3">-->
<!--                <button class="col-3 offset-2 bg-secondary text-white">Inscription</button>-->
<!--            </div>-->
<!--        </fieldset>-->
<!--    </form>-->
<!--</main>-->