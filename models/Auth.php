<?php

namespace app\models;

use app\core\Database;
use app\models\User;

class Auth
{

    public static function login(string $username, string $password)
    {
        $user = (new User())->findByUsername($username);

        if (is_bool($user))
            return false;
        $password = md5($password);
        return $user->password == $password;
    }

    public static function register(array $inputs)
    {
        $user = new user();
       if (($user->findByUsername($inputs['username']) && $user->findByemail($inputs['email']))){
           return false;
       }else{
         return $user->register($inputs);
       }
    }

    public static function user($username): User|bool
    {
        $user = (new User())->findByUsername($username);

        return $user ? $user : false;
    }
}
