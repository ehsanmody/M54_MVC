<?php

namespace app\controllers;

class HomeController extends BaseController
{

    public function home() {

        if(isset($_COOKIE['username']))
        {
            $data=['username' => $_COOKIE['username']];
            return $this->render('home',$data);
        }

        $data=['username' => 'guest user'];
        return $this->render('home',$data);
    }
}