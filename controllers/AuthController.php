<?php

namespace app\controllers;

use app\core\Application;
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
            session_start();
            $_SESSION["username"] = $data['username'];
            return Application::$app->response->redirect('/home');
        } else {
            return $this->render('auth/login', ["message" => "incorrect password"]);
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
        if($id === false){
            return $this->render('auth/register', ["message" => "user or email exist."]);
        }else{
            session_start();
            $_SESSION["username"] = $data['username'];
            return Application::$app->response->redirect('/home');
        }
        
    }
}