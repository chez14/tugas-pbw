<?php
Namespace Controller;
class index {
    public function get_index() {
        \Sistem\View::render("index.php",[]);
    }
}