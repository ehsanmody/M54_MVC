<?php

namespace app\models;

class User extends Model
{
    public $name;
    public $username;
    public $email;
    public $password;

    protected $table_name = "users";
    
    public function findByUsername($username)
    {
        return $this->select($this->table_name, ["username" => $username]);
    }

    public function createUser(array $inputs)
    {
        $data = array_values($inputs);
        array_unshift($data, "NULL");
        return $this->insert($this->table_name, $data);
    }
}
