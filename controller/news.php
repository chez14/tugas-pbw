<?php
namespace Controller;

class news {
    public static function get_index() {
        \Sistem\View::render("dashboard_news.php",[]);
    }
}