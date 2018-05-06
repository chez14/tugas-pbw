<?php
/**
 * Autocontrol is a url-to-classname intepreter for
 * this tugas.
 * It's basically do jobs that we don't actually like.
 */
Class Autocontrol {
    static function boot() {
        $r_method = strtolower($_SERVER['REQUEST_METHOD']);
        $path = explode("/", $_SERVER['REQUEST_URI']);
        $method_call = "index";
        if(empty($path[0]))
            $path[0] = "index";
        if(isset($path[1]) && !empty($path[1]))
            $method_call = $path[1];
        $classname = "Controller\\" . $path[0];
        $method_call = $r_method . "_" . $method_call;

        // bentuk url yang dipengenin:
        // /controller/method/param/param/param?param_get=value
        // Controller\controller->method(param,param);
        $param = array_slice($path, 2);
        if(!is_callable([$classname, $method_call])) {
            die(Sistem\Web::error(404));
        } else {
            call_user_func([$classname, $method_call], $param);
        }
        //done.
    }
}