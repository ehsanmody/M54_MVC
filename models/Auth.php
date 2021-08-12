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

        return $user->password == $password;
    }

    public static function register(array $inputs)
    {
        return (new User())->createUser($inputs);
    }

    public static function user(): User|bool
    {
        if (isset($_COOKIE['username']))
        {
            return (new User())->findByUsername($_COOKIE['username']);
        }
        return false;
    }
}
