<?php

use Blog\Repository\UserRepository;

$oUsers = UserRepository::findAll();
foreach ($oUsers as $oUser) {
    echo '<div style="width: 60%">' .
        '<p>Username : ' . $oUser->getUserName() . '</p>' .
        '<p>Adresse mail : ' . $oUser->getEmail() . '</p>' .
        '<p>Role : '. $oUser->getRole().'</p>';
    //'<p>Date de naissance : '.$oUser->getBirthAt().'</p>'.
        //'<p>Date de création : '.$oUser->getCreateAt().'</p>'.
//        '<p class="address">Adresse</p>' .
//        '</hr>' .
//        '<p>Nom de la rue : ' . $oUser->getAddress()->getStreet() . '</p>' .
//        '<p>Ville : ' . $oUser->getAddress()->getCity() . '</p>' .
//        '<p>Code postal : ' . $oUser->getAddress()->getPostalCode() . '</p>' .
//        '<p>Pays : ' . $oUser->getAddress()->getCountry() . '</p></div>';
}