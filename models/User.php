<?php

namespace app\models;


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

    public function findbyemail($email){
        return $this->select($this->table_name,["email" => $email]);
    }

    public function register($inputs){
        $inputs["password"] = md5($inputs["password"]);
        $sql = sprintf("INSERT INTO %s (name,username,email,password) VALUES ('%s','%s','%s','%s')", $this->table_name, $inputs['name'], $inputs['username'], $inputs['email'], $inputs['password']);

        return $this->insert($sql);
    }

    // public function login($username, $password){
        // return $this->login($username, $password) ? true : false;

    // }
}
