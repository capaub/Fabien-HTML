<?php

namespace Blog\Controller;

use Blog\Model\Address;
use Blog\Model\User;
use Blog\Repository\UserRepository;

class UserController extends AbstractController
{
    /**
     * @return string
     * @throws \Exception
     */
    public function login(): string
    {
        if (isset($_POST["field_login_username"], $_POST["field_login_password"])) {
            $sUsername = strip_tags($_POST["field_login_username"]);
            $sPassword = strip_tags($_POST["field_login_password"]);

            $oUser = authUser($sUsername, $sPassword);
            if ($oUser instanceof User) {
                $_SESSION['user'] = $oUser;
                echo 'authentificiation réussit';
                $_SESSION['flashes'][] = ['success' => 'Bienvenue' . $oUser->getUserName()];
                $this->redirectAndDie('?page=' . PAGE_HOME);
            } else {
                $_SESSION['flashes'][] = ['danger' => 'Identifiants invalides'];
            }
        }
        return $this->render('login.php');
    }

    /**
     * @return string
     */
    public function logout(): void
    {
        session_destroy();
        $this->redirectAndDie('?page=' . PAGE_HOME);
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function register(): string
    {
        if (isset(
            $_POST["field_signup_username"],
            $_POST["field_signup_email"],
            $_POST["field_signup_birthdate"],
            $_POST["field_signup_password"],
            $_POST["field_signup_street"],
            $_POST["field_signup_postalCode"],
            $_POST["field_signup_city"],
            $_POST["field_signup_country"],
        )) {
            $sUsername = strip_tags($_POST["field_signup_username"]);
            $sEmail = strip_tags($_POST["field_signup_email"]);
            $dBirthDate = strip_tags($_POST["field_signup_birthdate"]);
            $sPassword = strip_tags($_POST["field_signup_password"]);
            $sStreet = strip_tags($_POST["field_signup_street"]);
            $sPostalCode = strip_tags($_POST["field_signup_postalCode"]);
            $sCity = strip_tags($_POST["field_signup_city"]);
            $sCountry = strip_tags($_POST["field_signup_country"]);

//            $oAddress = new Address(
//                $sStreet,
//                $sPostalCode,
//                $sCity,
//                $sCountry,
//            );

            if (!UserRepository::isExist($sUsername)) {
                $oUser = new User($sUsername, $sEmail, new \DateTime($dBirthDate), hashPassword($sPassword));
                UserRepository::save($oUser);
                $_SESSION['user'] = $oUser;
                $_SESSION['flashes'][] = ['SUCCESS' => 'user created'];
                $this->redirectAndDie('?page=' . PAGE_MY_ACCOUNT);
            } else {
                $_SESSION['flashes'][] = ['ERREUR' => 'utilisateur existant'];
                $this->redirectAndDie('?page=' . PAGE_MY_ACCOUNT);
            }
        }
        return $this->render('register.php');
    }


    public function account(): string
    {
        if (isset(
            $_POST["field_signup_username"],
            $_POST["field_signup_email"],
            $_POST["field_signup_birthdate"],
            $_POST["field_signup_password"],
            $_POST["field_signup_street"],
            $_POST["field_signup_postalCode"],
            $_POST["field_signup_city"],
            $_POST["field_signup_country"],
        )) {
            $sUsername = strip_tags($_POST["field_signup_username"]);
            $sEmail = strip_tags($_POST["field_signup_email"]);
            $dBirthDate = strip_tags($_POST["field_signup_birthdate"]);
            $sPassword = strip_tags($_POST["field_signup_password"]);
            $sStreet = strip_tags($_POST["field_signup_street"]);
            $sPostalCode = strip_tags($_POST["field_signup_postalCode"]);
            $sCity = strip_tags($_POST["field_signup_city"]);
            $sCountry = strip_tags($_POST["field_signup_country"]);

//            $oAddress = new Address(
//                $sStreet,
//                $sPostalCode,
//                $sCity,
//                $sCountry,
//            );

            if (!UserRepository::isExist($sUsername)) {
                $oUser = new User($sUsername, $sEmail, new \DateTime($dBirthDate), hashPassword($sPassword));
                UserRepository::save($oUser);
                $_SESSION['user'] = $oUser;
                $_SESSION['flashes'][] = ['SUCCESS' => 'user created'];
                return $this->redirectAndDie('?page=' . PAGE_MY_ACCOUNT);
            } else {
                return $this->redirectAndDie('?page=' . PAGE_REGISTER);
            }
        }
        return $this->render('register.php');
    }
}