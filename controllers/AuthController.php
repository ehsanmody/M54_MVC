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
            $_SESSION['user'] = $data['username'];
            return "Login OK!";
        } else {
            return "username or password is incorrect";
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
        return "Registered " . $id;
    }

    public function logout()
    {
        session_destroy();
        return "Logged out";
    }
}