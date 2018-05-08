<?php

namespace Model;

abstract class BaseModel {
    private static $db;
    protected function get_db() {
        if(!self::$db){
            self::$db = \Sistem\Base::get_db();
        }
        return self::$db;
    }
}