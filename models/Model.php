<?php

namespace app\models;

use app\core\Database;
use PDOException;

class Model
{

    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getPDO();
    }

    public function select($table_name, array $where = [])
    {
        $attributes = array_keys($where);

        $sql = implode(" AND ", array_map(fn ($attr) => "$attr = :$attr", $attributes));
        $statement = $this->pdo->prepare("SELECT * FROM $table_name WHERE $sql");
       
        foreach ($where as $key => $item)
            $statement->bindValue(":$key", $item);
       
        $statement->execute();

        return $statement->fetchObject(get_called_class()) ?? false;
    }

    public function insert($sql){
        
        try {
        $this->pdo->exec($sql);
        return $this->pdo->lastInsertId();
        }catch (\PDOException $e){
            return false;
        }
    }
}
