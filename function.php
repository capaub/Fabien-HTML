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
 * @param object $aArticle
 * @return void
 */
function saveArticle(object $oArticle)
{
    file_put_contents(SAVE_DIR.DIRECTORY_SEPARATOR.uniqid("art_",false).'.article', serialize($oArticle));
}

/**
 * @return void
 */
function loadArticles():void
{
    $aFilenames=glob(SAVE_DIR.DIRECTORY_SEPARATOR.'*.article');
    foreach ($aFilenames as $file)
    {
        $article = unserialize(file_get_contents($file):mixed);
    }
}