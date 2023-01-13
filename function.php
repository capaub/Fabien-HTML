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
 * @param array $aArticle
 * @return void
 */
function saveArticle(array $aArticle)
{
    file_put_contents(SAVE_DIR.DIRECTORY_SEPARATOR.uniqid().'.json', json_encode($aArticle));
}