<?php

namespace Blog\Repository;

use Blog\Model\User;

class UserRepository
{
    /**
     * @param User $oUser
     * @return void
     */
    public static function save(User $oUser): void
    {
        global $oPdo;
        $oPdo->query('INSERT INTO user (username, password, role, email, createdAt, connectedAt, birthAt)
        VALUES (
                "' . $oUser->getUserName() . '",
                "' . $oUser->getPassword() . '",
                "' . $oUser->getRole() . '",
                "' . $oUser->getEmail() . '",
                "' . $oUser->getCreatedAt()->format('Y-m-d') . '",
                "' . $oUser->getConnectedAt()->format('Y-m-d H:i:s') . '",
                "' . $oUser->getBirthAt()->format('Y-m-d') . '")
                ');
    }

    /**
     * @return array
     * @throws \Exception
     */
    public static function findAll(): array
    {
        global $oPdo;

        $aUsers = [];

        $oUsers = $oPdo->query('SELECT * FROM user');

        while ($aUser = $oUsers->fetch()) {
            $oUser = new User($aUser['username'], $aUser['email'], new \DateTime($aUser['birthAt']), $aUser['password']);
            $oUser->setConnectedAt(new \DateTime($aUser['connectedAt']));
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
        global $oPdo;

        if (self::isExist($sUsername)) {

            $aBdUser = $oPdo->query('SELECT * FROM user WHERE username =  "' . $sUsername . '"')->fetch();
            if ($aBdUser) {

                $oUser = new User($aBdUser['username'], $aBdUser['email'], new \DateTime($aBdUser['birthAt']), $aBdUser['password']);
                $oUser->setConnectedAt(new \DateTime($aBdUser['connectedAt']));
                $oUser->setCreatedAt(new \DateTime($aBdUser['createdAt']));
                $oUser->setRole($aBdUser['role']);

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
        global $oPdo;

        $sQuery = 'SELECT COUNT(*) AS nb FROM user WHERE username = "' . $sUsername . '"';
        $oPdoStatement = $oPdo->query($sQuery);

        $aBdInfo = $oPdoStatement->fetch();

        return $aBdInfo['nb'] > 0;
    }
}