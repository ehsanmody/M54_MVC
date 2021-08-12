<?php

namespace app\core;

class Response
{
    public function setStatusCode(int $code) {
        http_response_code($code);
    }

    public function setContentType($type = "text/html")
    {
        header("Content-Type: $type; charset=UTF-8");
    }
}