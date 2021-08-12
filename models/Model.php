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
        $condition = "";

        foreach ($where as $key => $val) {
            $condition = $condition . " " . $key . "=" . "'" . $val . "'";
        }

        $sth = $this->pdo->prepare("SELECT * FROM $table_name WHERE $condition");

        $sth->execute();

        return $sth->fetchObject(get_called_class());
    }

    public function insert($table_name, array $data = [])
    {
        $format_data = [];

        foreach($data as $single) {
            $format_data[] = "'" . $single . "'";
        }
        $format_data = implode(", ", $format_data);

        $sth = $this->pdo->prepare("INSERT INTO $table_name VALUES ($format_data)");

        try {
            $sth->execute();
            return $this->pdo->lastInsertId();
        } catch(\PDOException $e) {
            echo $e->getMessage();
            return -1;
        }
    }
}
