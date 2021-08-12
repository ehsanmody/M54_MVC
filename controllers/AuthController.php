<?php

namespace app\controllers;

use app\models\Auth;
use app\models\User;
use app\core\Request;

class AuthController extends BaseController
{
    public function showLogin()
    {
        return $this->render('auth/login');
    }

    public function login(Request $request)
    {
        $data = $request->getBody();
        if (Auth::login($data['username'], $data['password'])) {
            setcookie("username", $data['username'], time() + 3600, "/");
            header("Location: /home?name=" . $data['username']);
        } else {
            header("Location: /login?error=" . "'Username and password does not match'");
        }
    }

    public function showRegister()
    {
        return $this->render('auth/register');
    }

    public function register(Request $request)
    {
        $data = $request->getBody();
        $id = Auth::register($data);
        if ($id == -1)
        {
            header("Location: /register?error=" . "'Registration failed'");
        } else {
            header("Location: /login");
        }
    }

    public function logout()
    {
        if(isset($_COOKIE['username']))
        {
            setcookie("username", "", time() - 1, "/");
        }
        header("Location: /login");
    }
}