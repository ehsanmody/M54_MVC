<?php

namespace app\models;

use app\core\Database;

class Model
{

    private static $pdo;

    public function __construct() {
        self::$pdo = Database::getInstance()->getPDO();
    }

    public static function insert(string $sql)
    {
        self::$pdo->exec($sql);
        return self::$pdo->lastInsertId();
    }
}
