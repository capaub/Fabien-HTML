<?php

/**
 * @param string $sMail
 * @param string $sSubject
 * @param string $sContent
 * @return bool
 */
function sendMail(string $sMail, string $sSubject, string $sContent):bool
{
    echo
    'Votre email à bien été envoyer à '.$sMail."</br></br>".
    'Subject :'.$sSubject."</br></br>".
    'Content :'.$sContent."</br></br>";

    return true;
}

/**
 * @param Article $aArticle
 * @return void
 */
function saveArticle(Article $oArticle)
{
    file_put_contents(SAVE_DIR.DIRECTORY_SEPARATOR.uniqid("art_",false).'.article', serialize($oArticle));
}

/**
 * @return array
 */

function loadArticles():array
{
    $aArticles = [];
    $aFilenames=glob(SAVE_DIR.DIRECTORY_SEPARATOR.'*.article');
    foreach ($aFilenames as $file)
    {
        $aArticles[] = unserialize(file_get_contents($file), ['allowed_classes' => true]);
    }
    return $aArticles;
}

/**
 * @param User $oUser
 * @return void
 */
function saveUser(User $oUser)
{
    file_put_contents(SAVE_DIR.DIRECTORY_SEPARATOR.$oUser->getUserName().'.user', serialize($oUser));
}

/**
 * @return array
 */
function loadUser():array
{
    $aUsers = [];
    $aFilenames=glob(SAVE_DIR.DIRECTORY_SEPARATOR.'*.user');
    foreach ($aFilenames as $file)
    {
        $aUsers[] = unserialize(file_get_contents($file), ['allowed_classes' => true]);
    }
    return $aUsers;
}

/**
 * @param string $sUsername
 * @return bool
 */
function isUserExist(string $sUsername):bool
{
    return file_exists(SAVE_DIR.DIRECTORY_SEPARATOR.$sUsername.'.user');
}