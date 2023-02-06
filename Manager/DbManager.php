<?php

namespace Blog\Manager;

class DbManager
{
    /** @var \PDO|null */
    private static ?\PDO $instance = NULL;

    /**
     * @return \PDO
     */
    public static function getInstance(): \PDO
    {
        if (!static::$instance instanceof \PDO) {
            $sDSN = 'mysql:dbname=blog;host=localhost;charset=UTF8';
            $aOptions = [\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'];

            $oPdo = new \PDO($sDSN, 'root', '', $aOptions);

            $oPdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING);

            static::$instance = $oPdo;
        }
        return static::$instance;
    }
}