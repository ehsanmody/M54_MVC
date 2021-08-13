<?php

namespace app\controllers;

use app\models\Auth;
use app\models\User;
use app\core\Request;
use app\controllers\HomeController;

class AuthController extends BaseController
{

    public function showLogin()
    {
        return $this->render('auth/login');
    }

    public function login(Request $request)
    {
        $data = $request->getBody();

        $data['password']=md5($data['password']);

        if (Auth::login($data['username'], $data['password'])) {

            setcookie('username',$data['username']);


            return $this->render('home',$data);


        } else {

            $data=['error' => "username or password is incorrect"];
            
            return $this->render('auth/login',$data);
        }
    }

    public function showRegister()
    {
        return $this->render('auth/register');
    }

    public function register(Request $request)
    {
        $data = $request->getBody();
        $id = User::register($data);

        return $id;
    }
}