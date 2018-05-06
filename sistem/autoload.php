<?php
Namespace Sistem;
session_start();
class Base {
    protected static $db = null;
    static function get_db() {
        // if(!class_exists('Config\DB')) {
        //     die(View::render("error.html", [
        //         "error"=>[
        //             "title"=>"Fatal Error",
        //             "desc"=>"The database is not present while it's needed."
        //         ]
        //     ]));
        // }
        if(self::$db)
            return self::$db;
        $d = new \mysqli(
            \Config\DB::$db['host'],
            \Config\DB::$db['username'],
            \Config\DB::$db['password'],
            \Config\DB::$db['dbname']
        );
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        if($d->connect_error) {
            die(View::render("error.html", [
                "error"=>[
                    "title"=>"Database Error",
                    "desc" => $d->connect_error
                ]
            ]));
        }
        self::$db = $d;
        return $d;
    }

    static function register_autoload() {
        $autoload_folder = [
            __DIR__ . "/",
            realpath(__DIR__ . "/..") . "/",
            realpath(__DIR__ . "/config") . "/",
        ];
        spl_autoload_register(function($class_name) use($autoload_folder){
            foreach($autoload_folder as $fold) {
                $file = str_replace("\\", DIRECTORY_SEPARATOR, trim($class_name, "\\") . ".php");
                if(!is_file($fold . $file))
                    $file = strtolower($file);
                if(!is_file($fold . $file))
                    continue;
                include ($fold . $file);  
            }
        });
    }

    static function boot() {
        //start autoload, aint time to include manually.
        self::register_autoload();
    }
}

// let's Boot!
Base::boot();