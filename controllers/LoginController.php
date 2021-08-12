<?php

namespace app\controllers;

use app\core\Request;

class LoginController extends BaseController
{

    public function handleLogin(Request $request) {
        $data = $request->getBody();

        if ($data['email'] == 'admin@admin.com' && $data['password'] == '1234') {
            return $this->render('home', ['name' => 'admin']);
            # TODO: Convert to redirect
        } else {
            return $this->render('login', [
                'error' => true,
                'message' => 'نام کاربری و رمز عبور اشتباه است.'
            ]);
        }
    }
}