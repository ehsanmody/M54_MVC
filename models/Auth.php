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
}
