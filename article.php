<?php

require_once 'Model/Article.php';
require_once 'Model/Category.php';

$oCat1 = new Category("Auto/Moto");
$oCat2 = new Category("Higth-Tech");
$oCat3 = new Category("Santé");

$aCats=[
    $oCat1,
    $oCat2,
    $oCat3,
];

$oArticle = new Article("Titre","Contenu", $oCat1);

echo
    $oArticle->getTitle().PHP_EOL.
    $oArticle->getContent().PHP_EOL.
    $oCat1->getName().PHP_EOL.
    $oArticle->getCreatedAt()->format('j-M-y H:i:s').PHP_EOL.
    Article::STATUS[$oArticle->getStatus()]
    ;