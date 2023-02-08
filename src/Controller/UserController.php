<?php

namespace Blog\Controller;

use Blog\Model\User;
use Blog\Repository\UserRepository;

class UserController extends AbstractController
{
    /**
     * @return string
     * @throws \Exception
     */
    public function login():string
    {
        if (isset($_POST["form_login"], $_POST["field_username"], $_POST["field_password"])) {
            $sCleanUsername = strip_tags($_POST["field_username"]);
            $sCleanPassword = strip_tags($_POST["field_password"]);

            $oUser = authUser($sCleanUsername, $sCleanPassword);
            if ($oUser instanceof User) {
                $_SESSION['user'] = $oUser;

                $_SESSION['flashes'][] = ['success' => 'Bienvenue' . $oUser->getUserName()];
                $this->redirectAndDie('?page=' . PAGE_MY_ACCOUNT);
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
            $sCleanUsername = strip_tags($_POST["field_signup_username"]);
            $sCleanEmail = strip_tags($_POST["field_signup_email"]);
            $dCleanBirthDate = strip_tags($_POST["field_signup_birthdate"]);
            $sCleanPassword = strip_tags($_POST["field_signup_password"]);
            $sCleanStreet = strip_tags($_POST["field_signup_street"]);
            $sCleanPostalCode = strip_tags($_POST["field_signup_postalCode"]);
            $sCleanCity = strip_tags($_POST["field_signup_city"]);
            $sCleanCountry = strip_tags($_POST["field_signup_country"]);

//            $oAddress = new Address(
//                $sStreet,
//                $sPostalCode,
//                $sCity,
//                $sCountry,
//            );

            if (!UserRepository::isExist($sCleanUsername)) {
                $sHashedPassword = hashUserPassword($sCleanPassword);
                $oUser = new User($sCleanUsername, $sCleanEmail, new \DateTime($dCleanBirthDate), $sHashedPassword);

                UserRepository::save($oUser);

                $_SESSION['user'] = $oUser;
                $_SESSION['flashes'][] = ['SUCCESS' => 'Bienvenue ' . $oUser->getUserName()];

                $this->redirectAndDie('?page=' . PAGE_MY_ACCOUNT);
            } else {
                $_SESSION['flashes'][] = ['ERREUR' => 'Compte déjà existant'];
            }
        }
        return $this->render('signup.php');
    }

    /**
     * @return string
     */
    public function account(): string
    {
            return $this->render('my-account.php');
    }
}