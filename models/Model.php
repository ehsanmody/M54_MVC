<?php

namespace app\models;

use app\core\Database;

class Model
{

    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getPDO();
    }

    public function select($table_name, array $where = [])
    {
        $key = array_keys($where)[0];
        $value = $where[$key];

        $sth = $this->pdo->prepare("SELECT * FROM $table_name where $key = '$value'");
        $sth->execute();

        return $sth->fetch(\PDO::FETCH_ASSOC);
    }
}
