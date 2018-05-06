<?php
namespace Controller;
class user {
    public function get_login() {
        \Sistem\View::render("user_login.php",[]);        
    }
    public function get_signup() {
        \Sistem\View::render("user_register.php",[]);        
    }
}