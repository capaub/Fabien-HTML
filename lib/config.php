<?php

date_default_timezone_set('Europe/Paris');

const PAGE_HOME = 'home';
const PAGE_CONTACT = 'contact';
const PAGE_ADMIN = 'admin';
//const PAGE_NEW_ARTICLE = 'newArticle';
const PAGE_ARTICLE = 'article';
const PAGE_MY_ACCOUNT = 'my-account';
const PAGE_LOGIN = 'login';
const PAGE_LOGOUT = 'logout';
const PAGE_SIGNUP = 'signup';

const TITLE_HOME = 'Accueil';
const TITLE_CONTACT = 'Nous contacter';
const TITLE_ADMIN = "Admin";
const TITLE_NEW_ARTICLE = "Envoyer un articles";
const TITLE_ARTICLES = "Articles";
const TITLE_USER = "Mon compte";
const TITLE_SIGNUP = "Inscription";
const TITLE_LOGIN = 'Connexion';

const EMAIL_ADMIN = "admin@monsite.fr";
const SAVE_DIR = "data";
const DIR_UPLOADS = 'uploads';

const ROUTING = [
    PAGE_HOME => '\Blog\Controller\DefaultController::home',
    PAGE_LOGOUT => '\Blog\Controller\UserController::logout',
    PAGE_CONTACT => '\Blog\Controller\DefaultController::contact',
    PAGE_ADMIN => '\Blog\Controller\AdminController::admin',
//    PAGE_NEW_ARTICLE => '\Blog\Controller\BlogController::article',
    PAGE_ARTICLE => '\Blog\Controller\BlogController::article',
    PAGE_MY_ACCOUNT => '\Blog\Controller\UserController::account',
    PAGE_LOGIN => '\Blog\Controller\UserController::login',
    PAGE_SIGNUP => '\Blog\Controller\UserController::register',
];