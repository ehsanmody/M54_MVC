<?php

namespace app\models;

use app\models\traits\Login;

class User extends Model
{
    use Login;

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
