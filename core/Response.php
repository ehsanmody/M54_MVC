<?php

namespace app\core;

use app\core\Application;

class Response
{
    public function setStatusCode(int $code) {
        http_response_code($code);
    }

    public function setContentType($type = "text/html")
    {
        header("Content-Type: $type; charset=UTF-8");
    }

    public function redirect(string $name = "root", int $code = 301) {
        $path = Application::$app->router->getURL($name);
        header("Location: $path", TRUE, $code);
    }
}