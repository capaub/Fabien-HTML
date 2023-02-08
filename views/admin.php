<main>
    <h1>Espace admin</h1>
    <fieldest>
        <legend>Créer un article</legend>

        <form method="POST" enctype="multipart/form-data">
            <div>
                <label for="category">Catégorie</label>
                <select name="field_category" id="category">
                    <?php
                    foreach($categories as $oCategory) {
                        echo '<option value="' . $oCategory->getId() . '">' .$oCategory->getName().'</option>';
                    }
                    ?>
                </select>
            </div>
            <div>
                <label for="picture">Photo d'illustration</label>
                <input id="picture" name="field_picture" type="file"/>
            </div>
            <div>
                <label for="title">Titre</label>
                <input id="title" name="field_title" type="text"/>
            </div>
            <div>
                <label for="content">Message</label>
                <textarea id="content" name="field_content" ></textarea>
            </div>
            <button name="form_new_article" value="nex_article">Envoyer</button>
        </form>
    </fieldest>

    <h2>Mes utilisateurs</h2>
    <table>
        <thead>
        <tr>
            <th>Nom d'utilisateur</th>
            <th>Email</th>
            <th>Rôle</th>
            <th>Date de création</th>
            <th>Date de connexion</th>
        </tr>
        </thead>
        <tbody>
        <?php

        use Blog\Model\User;

        foreach($users as $oUser){
            echo '<tr>';
            echo '<th>'.$oUser->getUsername().'</th>';
            echo '<th>'.$oUser->getEmail().'</th>';
            echo '<th>'.User::ROLE_CONF[$oUser->getRole()]['label'].'</th>';
            echo '<th>'.$oUser->getCreatedAt()->format('d/m/Y H:i').'</th>';
            echo '<th>'.$oUser->getConnectedAt()->format('d/m/Y H:i').'</th>';
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