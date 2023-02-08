<?php

use Blog\Model\User;
use Blog\Repository\UserRepository;

/**
 * @param string $sMail
 * @param string $sSubject
 * @param string $sContent
 * @return bool
 */
function sendMail(string $sMail, string $sSubject, string $sContent): bool
{
    echo
        'Votre email à bien été envoyer à ' . $sMail . "</br></br>" .
        'Subject :' . $sSubject . "</br></br>" .
        'Content :' . $sContent . "</br></br>";

    return true;
}

/**
 * @param $sPassword
 * @return string
 */
function hashUserPassword($sPassword): string
{
    return password_hash($sPassword, PASSWORD_BCRYPT);
}

/**
 * @param string $sUsername
 * @param string $sPassword
 * @return User|null
 * @throws Exception
 */
function authUser(string $sUsername, string $sPassword): ?User
{
    $oUser = UserRepository::findByUsername($sUsername);
    print_r($oUser);
    if ($oUser instanceof User && password_verify($sPassword, $oUser->getPassword())) {
        return $oUser;
    }
    return NULL;
}