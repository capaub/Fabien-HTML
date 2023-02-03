<?php

use Blog\Repository\UserRepository;

$oUsers = UserRepository::findAll();

?>
<table>
    <thead>
    <tr>
        <th>Nom</th>
        <th>Email</th>
        <th>date de naissance</th>
        <th>Rôle</th>
        <th>Mot de passe</th>
        <th>Date de création</th>
        <th>Date de connexion</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($oUsers as $oUser) : ?>
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