<?php

use Blog\Repository\UserRepository;

$aUsers = UserRepository::findAll();

?>
<table class="table container">
    <thead class="row">
        <tr class="col">
            <th class="">Nom</th>
            <th class="">Email</th>
            <th class="">date de naissance</th>
            <th class="">Rôle</th>
            <th class="">Mot de passe</th>
            <th class="">Date de création</th>
            <th class="">Date de connexion</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($aUsers as $oUser) : ?>
        <tr>
            <td><?= $oUser->getUserName() ?></td>
            <td><?= $oUser->getEmail() ?></td>
            <td><?= $oUser->getBirthAt()->format('Y-m-d H:i:s') ?></td>
            <td><?= $oUser->getRole() ?></td>
            <td><?= $oUser->getPassword() ?></td>
            <td><?= $oUser->getCreatedAt()->format('Y-m-d H:i:s') ?></td>
            <td><?= $oUser->getConnectedAt()->format('Y-m-d H:i:s') ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>