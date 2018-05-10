<?php
namespace Helper;

class AB {
    public static function generate($length, $sequence="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"){
        $temp = "";
        while($length--) {
            $temp .= $sequence[rand(0, \strlen($sequence))];
        }
        return $temp;
    }
}