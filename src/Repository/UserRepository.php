<?php

namespace Blog\Repository;

use Blog\Manager\DbManager;
use Blog\Model\User;

class UserRepository
{
    /**
     * @param User $oUser
     * @return bool
     */
    public static function save(User $oUser): bool
    {
        $oPdo = DbManager::getInstance();

        $sQuery = 'INSERT INTO user (username, password, role, email, createdAt, connectedAt, birthAt)
        VALUES (
                :username,
                :password,
                :role,
                :email,
                :createdAt,
                :connectedAt,
                :birthAt)';

        $oPdoUser = $oPdo->prepare($sQuery);

        $oPdoUser->bindValue(':username', $oUser->getUserName(), \PDO::PARAM_STR);
        $oPdoUser->bindValue(':password', $oUser->getPassword(), \PDO::PARAM_STR);
        $oPdoUser->bindValue(':role', $oUser->getRole(), \PDO::PARAM_INT);
        $oPdoUser->bindValue(':email', $oUser->getEmail(), \PDO::PARAM_STR);
        $oPdoUser->bindValue(':createdAt', $oUser->getCreatedAt()->format('Y-m-d'), \PDO::PARAM_STR);
        $oPdoUser->bindValue(':connectedAt', $oUser->getConnectedAt()->format('Y-m-d'), \PDO::PARAM_STR);
        $oPdoUser->bindValue(':birthAt', $oUser->getBirthAt()->format('Y-m-d'), \PDO::PARAM_STR);

        return $oPdoUser->execute();
    }

    /**
     * @return array
     * @throws \Exception
     */
    public static function findAll(): array
    {
        $oPdo = DbManager::getInstance();

        $aUsers = [];

        $oUsers = $oPdo->query('SELECT * FROM user');

        while ($aUser = $oUsers->fetch()) {
            $oUser = new User($aUser['username'], $aUser['email'], new \DateTime($aUser['birthAt']), $aUser['password']);
            $oUser->setCreatedAt(new \DateTime($aUser['createdAt']));
            $oUser->setRole($aUser['role']);

            $aUsers[] = $oUser;
        }
        return $aUsers;
    }

    /**
     * @param $sUsername
     * @return User|null
     * @throws \Exception
     */
    public static function find($sUsername): ?User
    {
        $oPdo = DbManager::getInstance();

        if (self::isExist($sUsername)) {

            $oPdoUser = $oPdo->prepare('SELECT * FROM user WHERE `username` =  :username');
            $oPdoUser->bindValue(':username', $sUsername, \PDO::PARAM_STR);
            $oPdoUser->execute();

            $oBdUser = $oPdoUser->fetch();

            if ($oBdUser) {

                $oUser = new User($oBdUser['username'], $oBdUser['email'], new \DateTime($oBdUser['birthAt']), $oBdUser['password']);
                $oUser->setConnectedAt(new \DateTime($oBdUser['connectedAt']));
                $oUser->setCreatedAt(new \DateTime($oBdUser['createdAt']));
                $oUser->setRole($oBdUser['role']);
                $oUser->setId($oBdUser['id']);

                return $oUser;
            }
        }
        return NULL;
    }

    /**
     * @param string $sUsername
     * @return bool
     */
    public static function isExist(string $sUsername): bool
    {
        $oPdo = DbManager::getInstance();

        $sQuery = 'SELECT COUNT(*) AS nb FROM user WHERE username = :username';
        $oPdoStatement = $oPdo->prepare($sQuery);
        $oPdoStatement->bindValue(':username', $sUsername, \PDO::PARAM_STR);
        $oPdoStatement->execute();

        $oBdInfo = $oPdoStatement->fetch();

        return $oBdInfo['nb'] > 0;
    }

//    public static function updateUser(): bool
//    {
//        $oUser = $_SESSION['user'];
//        $oUser->setId($oPdoCat['id']);
//        $oUser->setId();
//
//        global $oPdo;
//
//        $sQuery = 'UPDATE user FROM ';
//    }

//    public static function resetPassword(): bool
//    {
//
//    }

}