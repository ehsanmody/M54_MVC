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
        $condition = [];

        foreach ($where as $key => $val) {
            $condition[] = $key . "=" . "'" . $val . "'";
        }

        $condition = implode(" AND ", $condition);

        $sth = $this->pdo->prepare("SELECT * FROM $table_name WHERE $condition");
        $sth->execute();

        // get_class($this) OR get_called_class() = child/called classes
        return $sth->fetchObject(get_called_class());
    }
}
