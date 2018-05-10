<?php
namespace Model;
class User extends BaseModel {

    public static
        $timeout = 3600*24*7;

    public static function verify_credential($username, $password) {
        $statement = parent::get_db()->prepare("SELECT * FROM anggota WHERE username = ?");
        $statement->bind_param("s", $username);
        $statement->execute();
        $res = \Helper\DB::fetch_all($statement->get_result())[0];
        if(!$res)
            return false;

        return $res['password'] == self::hash_pass($password);
    }

    public static function hash_pass($pass) {
        return md5($pass);
    }

    public static function inject_user($username) {
        $statement = parent::get_db()->prepare("SELECT * FROM anggota WHERE username = ?");
        $statement->bind_param("s", $username);
        $statement->execute();
        $res = \Helper\DB::fetch_all($statement->get_result())[0];

        $salted_egg = sha1($res['id'] . \Sistem\Config\Constants::$salt);
        setcookie("user_id", $res['id'], time() + self::$timeout, "/");
        setcookie("user_token", $salted_egg, time() + self::$timeout, "/");
    }

    public static function fetch_user() {
        $salted = sha1($_COOKIE['user_id'] . \Sistem\Config\Constants::$salt);
        if($salted != $_COOKIE['user_token']) {
            self::deinject();
            return null;
        }
        return self::get_by_id($_COOKIE['user_id']);
    }

    public static function deinject() {
        setcookie("user_id", "", time() - self::$timeout, "/");
        setcookie("user_token", "", time() - self::$timeout, "/");
    }

    public static function get_by_id($id) {
        $statement = parent::get_db()->prepare("SELECT * FROM anggota WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return \Helper\DB::fetch_all($statement->get_result())[0];
    }
}