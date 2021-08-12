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
}
