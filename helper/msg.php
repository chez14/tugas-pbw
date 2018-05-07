<?php
namespace Helper;
class Msg {
    protected static
     $msg_storage_name = "helper_message";

    public static function add($message, $type="is-info", $namespace="public") {
        if(!isset($_SESSION[self::$msg_storage_name][$namespace]))
            $_SESSION[self::$msg_storage_name][$namespace] = [];
        $_SESSION[self::$msg_storage_name][$namespace][] = [
            "message" => $message,
            "type" => $type
        ];
    }

    public static function get_all($namespace="public") {
        if(!isset($_SESSION[self::$msg_storage_name][$namespace]))
            return null;
        $message = $_SESSION[self::$msg_storage_name][$namespace];
        $_SESSION[self::$msg_storage_name][$namespace] = null;
        return $message;
    }
}