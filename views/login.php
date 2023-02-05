<main>
    <form class="container" action="?page=<?php echo PAGE_LOGIN; ?>" method="POST" class="form_login">
        <fieldset class="row">
            <legend class="text-center text-white">Connexion</legend>
            <div class="row">
                <label class="col-8 offset-2 text-white" for="field_login_username">UserName</label>
                <input class="col-8 offset-2" type="text" name="field_login_username" id="field_login_username" required>
            </div>
            <div class="row">
                <label class="col-8 offset-2 text-white" for="field_login_password">Password</label>
                <input class="col-8 offset-2" type="password" name="field_login_password" id="field_login_password" required>
            </div>
            <div class="row">
                <button class="col-3 offset-7 my-2">Connexion</button>
            </div>
        </fieldset>
    </form>
</main><?php
