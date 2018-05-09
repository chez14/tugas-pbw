<?php
Namespace Controller;
class index {
    public function get_index() {
        $user = \Model\User::fetch_user();
        if(!$user)
            return \Sistem\View::render("index.php",[]);
        \Sistem\View::render("dashboard_user.php",[]);
    }
}