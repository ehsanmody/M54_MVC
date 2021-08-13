<?php 

namespace app\core;

use app\utils\Cookie;

class Message
{
    public static function check()
    {
        return Cookie::get("message");
    }

    public static function addMessage($content = "", $type="error")
    {
        Cookie::set("message", $content, 3600);
        Cookie::set("type", $type, 3600);
    }

    public static function clear()
    {
        Cookie::set("message", "", -3601);
        Cookie::set("type", "", -3601);
    }

    public static function getMessage()
    {
        return Cookie::get("message");
    }

    public static function getType()
    {
        return Cookie::get("type");
    }
}

?>