<?php
namespace Controller;
class user {
    public static function get_login() {
        \Sistem\View::render("user_login.php",[]);        
    }

    public static function post_login() {
        if(!isset($_POST['username']) || empty($_POST['username'])) {
            \Helper\Msg::add("Please enter your username.", "is-danger");
            return self::get_login();
        }
        if(!isset($_POST['password']) || empty($_POST['password'])) {
            \Helper\Msg::add("Please enter your password.", "is-danger");
            return self::get_login();
        }
        if(!\Model\User::verify_credential($_POST['username'], $_POST['password'])) {
            \Helper\Msg::add("Your credential doesn't match with our database. Please try again later.", "is-danger");
            return self::get_login();
        }
        // validated.
        \Model\User::inject_user($_POST['username']);
        header("Location: /");
    }

    public static function get_signup() {
        \Sistem\View::render("user_register.php",[]);
    }

    public static function post_register() {
        \Helper\Ajaxify::boot();

        $statement = \Sistem\Base::get_db()
            ->prepare("INSERT INTO anggota(username, password, nama, telepon, alamat, is_admin) values(?, ?, ?, ?, ?, 0)");
        $statement->bind_param("sssss", 
            $_POST['username'],
            \Model\User::hash_pass($_POST['password']),
            $_POST['nama'],
            $_POST['phone'],
            $_POST['address']
        );
        $statement->execute();
        \Helper\Ajaxify::serve(["status"=>true]);
    }

    public static function get_logout() {
        \Model\User::deinject();
        \Helper\Msg::add("You have been logouted successfully.", "is-info");
        header("Location: /");
    }
}