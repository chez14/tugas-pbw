<?php
Namespace Controller;
class index {
    public function get_index() {
        \Helper\Msg::add("Kambing");
        \Sistem\View::render("index.php",[]);
    }
}