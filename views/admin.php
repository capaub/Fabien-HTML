<main>
    <h1 class="text-white text-center">Espace admin</h1>
    <fieldest class="container">
        <legend class="text-white text-center">Créer un article</legend>

        <form method="POST" enctype="multipart/form-data">
            <div>
                <label class="offset-3 text-white text-center" for="category">Catégorie</label>
                <select class="text-bg-secondary" name="field_category" id="category">
                    <?php
                    foreach($categories as $oCategory) {
                        echo '<option class="text-center" value="' . $oCategory->getId() . '">' .$oCategory->getName().'</option>';
                    }
                    ?>
                </select>
            </div>
            <div>
                <label  class="offset-3 text-white text-center" for="picture">Photo d'illustration</label>
                <input id="picture" name="field_picture" type="file"/>
            </div>
            <div>
                <label class="offset-3 text-white text-center" for="title">Titre</label>
                <input id="title" name="field_title" type="text"/>
            </div>
            <div>
                <label class="offset-3 text-white text-center" for="content">Message</label>
                <textarea id="content" name="field_content" ></textarea>
            </div>
            <button class="offset-3 text-center" name="form_new_article" value="nex_article">Envoyer</button>
        </form>
    </fieldest>
        <h2 class="offset-3 text-white text-start">Mes utilisateurs</h2>
        <table class="container">
            <thead>
            <tr>
                <th class="text-white text-start">Nom d'utilisateur</th>
                <th class="text-white text-start">Email</th>
                <th class="text-white text-start">Rôle</th>
                <th class="text-white text-start">Date de création</th>
                <th class="text-white text-start">Date de connexion</th>
            </tr>
            </thead>
            <tbody>
            <?php

            use Blog\Model\User;

            foreach($users as $oUser){
                echo '<tr>';
                echo '<th class="text-white text-start">'.$oUser->getUsername().'</th>';
                echo '<th class="text-white text-start">'.$oUser->getEmail().'</th>';
                echo '<th class="text-white text-start">'.User::ROLE_CONF[$oUser->getRole()]['label'].'</th>';
                echo '<th class="text-white text-start">'.$oUser->getCreatedAt()->format('d/m/Y H:i').'</th>';
                echo '<th class="text-white text-start">'.$oUser->getConnectedAt()->format('d/m/Y H:i').'</th>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
</main>
<!--<table class="table container">-->
<!--    <thead class="">-->
<!--    <tr class="">-->
<!--        <th class="text-center text-white">Nom</th>-->
<!--        <th class="text-center text-white">Email</th>-->
<!--        <th class="text-center text-white">date de naissance</th>-->
<!--        <th class="text-center text-white">Rôle</th>-->
<!--        <!--            <th class="text-center text-white">Mot de passe</th>-->-->
<!--        <th class="text-center text-white">Date de création</th>-->
<!--        <th class="text-center text-white">Date de connexion</th>-->
<!--    </tr>-->
<!--    </thead>-->
<!--    <tbody>-->
<!--    --><?php //foreach ($aUsers as $oUser) : ?>
<!--        <tr>-->
<!--            <td class="text-center text-white">--><?php //= $oUser->getUserName() ?><!--</td>-->
<!--            <td class="text-center text-white">--><?php //= $oUser->getEmail() ?><!--</td>-->
<!--            <td class="text-center text-white">--><?php //= $oUser->getBirthAt()->format('Y-m-d H:i:s') ?><!--</td>-->
<!--            <td class="text-center text-white">--><?php //= $oUser->getRole() ?><!--</td>-->
<!--            <!--            <td class="text-center text-white">-->--><?php ////= $oUser->getPassword() ?><!--<!--</td>-->-->
<!--            <td class="text-center text-white">--><?php //= $oUser->getCreatedAt()->format('Y-m-d H:i:s') ?><!--</td>-->
<!--            <td class="text-center text-white">--><?php //= $oUser->getConnectedAt()->format('Y-m-d H:i:s') ?><!--</td>-->
<!--        </tr>-->
<!--    --><?php //endforeach; ?>
<!--    </tbody>-->
<!--</table>-->