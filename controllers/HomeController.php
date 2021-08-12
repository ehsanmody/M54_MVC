<?php

namespace app\controllers;

use app\models\Auth;

class HomeController extends BaseController
{

    public function home() {
        $user = Auth::user();

        $data['name'] = is_bool($user) ? "Guest" : $user->username;
        
        return $this->render('home', $data);
    }
}