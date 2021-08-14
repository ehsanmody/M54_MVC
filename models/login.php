<?php

namespace app\models;
use app\utils\Cookie;
trait Login {


    public function login($username, $password){
    $user = $this->findByUsername($username);

    if (is_bool($user))
        return false;
    $password = md5($password);
    if ($user->password == $password) {
        Cookie::set('username', $user->username);
        return true;
    }

}
}