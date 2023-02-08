<main class="container">
    <h1 class="text-white text-center">Formulaire de connexion</h1>

    <form method="POST">
        <div class="row m-2">
            <label class="offset-3 text-white text-start" for="username">Pseudo</label>
            <input class="offset-3 col-4" required id="username" name="field_username" type="text" />
        </div>
        <div class="row m-2">
            <label class="offset-3 text-white text-start" for="password">Mot de passe</label>
            <input class="offset-3 col-4" required id="password" name="field_password" type="password" />
        </div>
        <div class="row m-2">
            <button class="offset-3 col-2 text-center" name="form_login" value="login" >Envoyer</button>
        </div>
    </form>
</main>

<!--<main>-->
<!--    <form class="container" method="POST"">-->
<!--        <fieldset class="row">-->
<!--            <legend class="text-center text-white">Connexion</legend>-->
<!--            <div class="row">-->
<!--                <label class="col-8 offset-2 text-white" for="field_login_username">UserName</label>-->
<!--                <input class="col-8 offset-2" type="text" name="field_login_username" id="field_login_username"-->
<!--                       required>-->
<!--            </div>-->
<!--            <div class="row">-->
<!--                <label class="col-8 offset-2 text-white" for="field_login_password">Password</label>-->
<!--                <input class="col-8 offset-2" type="password" name="field_login_password" id="field_login_password"-->
<!--                       required>-->
<!--            </div>-->
<!--            <div class="row">-->
<!--                <button name="form_login" class="col-3 offset-7 my-2">Connexion</button>-->
<!--            </div>-->
<!--        </fieldset>-->
<!--    </form>-->
<!--</main>-->
