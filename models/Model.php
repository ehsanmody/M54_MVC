<?php

namespace app\models;

use app\core\Database;

class Model
{
    private $pdo;

    public function __construct() 
    {
        $this->pdo = Database::getInstance()->getPDO();
    }

    public function select($table_name, array $where = [])
    {
        $sth = $this->pdo->prepare("SELECT * FROM $table_name");

        // Binding with column allows us to have a multi state where condition
        foreach ($where as $key => &$val) {
            $sth->bindColumn($key, $val);
        }

        $sth->execute();

        return $sth->fetchObject(get_called_class());
    }

    public function insert($table_name, array $data = [])
    {

    }
}
