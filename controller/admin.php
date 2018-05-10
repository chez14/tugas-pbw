<?php
namespace Controller;
class admin {
    public static function get_list() {
        $query = null;
        $statement = null;
        $by = ["username", "nama", "telepon", "alamat"];
        if(isset($_GET['q']) && isset($_GET['by']) && in_array($_GET['by'], $by)) {
            $statement = \Sistem\Base::get_db()->prepare("SELECT * FROM anggota WHERE " . $_GET['by'] . " like ? AND is_admin = ?");
            $_GET['q'] = "%" . $_GET['q'] . "%";
            $statement->bind_param("si", $_GET['q'], $_GET['is_admin']);
        } else {
            $statement = \Sistem\Base::get_db()->prepare("SELECT * FROM anggota where is_admin = ?");
            $statement->bind_param("i", $_GET['is_admin']);
        }
        $statement->execute();
        $query = $statement->get_result();
        $user = \Helper\DB::fetch_all($query);

        \Sistem\View::render("dashboard_userman.php",[
            "users"=>$user,
            "allow_search"=>$by
        ]);     
    }

    public static function post_list() {
        if(!\Model\User::fetch_user())
            return self::get_list();
                
        $statement = \Sistem\Base::get_db()->prepare("INSERT INTO anggota (username, password, nama, telepon, alamat, is_admin) VALUES(?,?,?,?,?,1)");
        $password = \Helper\AB::generate(14);
        $statement->bind_param(
            "sssss",
            $_POST['username'],
            $password,
            $_POST['name'],
            $_POST['phone'],
            $_POST['address']
        );
        try {
            $statement->execute();
            \Helper\Msg::add("Admin creation success, this is password for <code>$_POST[username]</code>: <code>$password</code>", "is-success");
        } catch (\Exception $e){
            \Helper\Msg::add("Admin creation failed for <code>$_POST[username]</code>: Username has been used", "is-danger");
        }
        return self::get_list();
    }
}