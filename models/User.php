<?php

namespace app\models;

class User extends Model
{

    protected static $table_name = "users";
    
    public static function register(array $inputs)
    {
        $sql = sprintf("INSERT INTO %s (name,username,email,password) VALUES ('%s','%s','%s','%s')", self::$table_name, $inputs['name'], $inputs['username'], $inputs['email'], $inputs['password']);

        return static::insert($sql);
    }
}
