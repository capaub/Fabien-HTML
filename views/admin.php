<?php

use Blog\Repository\UserRepository;

$aUsers = UserRepository::findAll();

?>
<table class="table container">
    <thead class="">
    <tr class="">
        <th class="text-center text-white">Nom</th>
        <th class="text-center text-white">Email</th>
        <th class="text-center text-white">date de naissance</th>
        <th class="text-center text-white">Rôle</th>
        <!--            <th class="text-center text-white">Mot de passe</th>-->
        <th class="text-center text-white">Date de création</th>
        <th class="text-center text-white">Date de connexion</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($aUsers as $oUser) : ?>
        <tr>
            <td class="text-center text-white"><?= $oUser->getUserName() ?></td>
            <td class="text-center text-white"><?= $oUser->getEmail() ?></td>
            <td class="text-center text-white"><?= $oUser->getBirthAt()->format('Y-m-d H:i:s') ?></td>
            <td class="text-center text-white"><?= $oUser->getRole() ?></td>
            <!--            <td class="text-center text-white">--><?php //= $oUser->getPassword() ?><!--</td>-->
            <td class="text-center text-white"><?= $oUser->getCreatedAt()->format('Y-m-d H:i:s') ?></td>
            <td class="text-center text-white"><?= $oUser->getConnectedAt()->format('Y-m-d H:i:s') ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>