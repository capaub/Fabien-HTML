<?php

namespace Blog\Repository;

use Blog\Model\User;

class UserRepository
{
    /**
     * @param User $oUser
     * @return void
     */
    public static function save(User $oUser)
    {
        file_put_contents(SAVE_DIR . DIRECTORY_SEPARATOR . $oUser->getUserName() . '.user', serialize($oUser));
    }

    /**
     * @return array
     */
    public static function findAll(): array
    {
        $aUsers = [];
        $aFilenames = glob(SAVE_DIR . DIRECTORY_SEPARATOR . '*.user');
        foreach ($aFilenames as $file) {
            $aUsers[] = unserialize(file_get_contents($file), ['allowed_classes' => true]);
        }
        return $aUsers;
    }

    /**
     * @param $sUsername
     * @return User|null
     */
    public static function find($sUsername): ?User
    {
        if (self::isExist($sUsername)) {
            $aFilename = SAVE_DIR . DIRECTORY_SEPARATOR . $sUsername . '.user';
            return unserialize(file_get_contents($aFilename), ['allowed_classes' => true]);
        }

        return null;
    }

    /**
     * @param string $sUsername
     * @return bool
     */
    public static function isExist(string $sUsername): bool
    {
        return file_exists(SAVE_DIR . DIRECTORY_SEPARATOR . $sUsername . '.user');
    }
}