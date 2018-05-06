<?php
Namespace Helper;
class Ajaxify {

    public static function boot() {
        header("Content-type: application/json");
        // do CORS here.
        $pbody = file_get_contents('php://input');
        if($pbody)
            $_POST = array_merge($_POST, json_decode($pbody, true));
    }

    public static function serve($data = []) {
        echo json_encode($data, isset($_GET['prettyprint'])?JSON_PRETTY_PRINT:0);
        return ;
    }

    public static function error($detail, $http_code = 200, $http_reason = null) {
        $http_reason = $http_reason?:Sistem\Web::$httpcode[$http_code];
        header($_SERVER['SERVER_PROTOCOL'].' '.$http_code.' '.$http_reason);
        die(self::serve(["error"=>$detail])); //prevent executing more codes from now on.
    }
}