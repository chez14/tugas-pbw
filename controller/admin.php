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

    public static function get_faker() {
        \Sistem\View::render("dashboard_faker.php",[]);        
    }

    public static function post_faker() {
        //generate user
        $user_id = [];
        $category = [];
        $book = [];

        $total_user = 50;
        $total_book = 30;
        $total_category = 3;
        $total_book_per_category = 10;
        $total_pinjam = 20;
        $total_admin = 3;

        //generate user
        for($i=0; $i<$total_user; $i++) {
            try {
                $statement = \Sistem\Base::get_db()->prepare("INSERT INTO anggota (username, password, nama, telepon, alamat, is_admin) VALUES(?,?,?,?,?,0)");
                $data=\Helper\AB::generate(32);
                $statement->bind_param(
                    "sssss",
                    $data,
                    $x=\Model\User::hash_pass($data),
                    $data,
                    $data,
                    $data
                );
                $statement->execute();
                $user_id[] = $statement->insert_id;
            } catch (\Exception $e) {
                //gagal update
            }
        }
        for($i=0; $i<$total_admin; $i++) {
            try {
                $statement = \Sistem\Base::get_db()->prepare("INSERT INTO anggota (username, password, nama, telepon, alamat, is_admin) VALUES(?,?,?,?,?,0)");
                $data=\Helper\AB::generate(32);
                $statement->bind_param(
                    "sssss",
                    $data,
                    $x=\Model\User::hash_pass($data),
                    $data,
                    $data,
                    $data
                );
                $statement->execute();
                $user_admin[] = $statement->insert_id;
                \Helper\Msg::add("An admin has been added with username and password: <code>" . $data . "</code>", "is-warning");
            } catch (\Exception $e) {
                //gagal update
            }
        }

        //buku
        for($i=0; $i<$total_book; $i++) {
            try {
                $statement = \Sistem\Base::get_db()->prepare("INSERT INTO buku (code, title, publication_year, author, publisher) VALUES(?,?,?,?,?)");
                $data=\Helper\AB::generate(32);
                $statement->bind_param(
                    "sssss",
                    $a=\Helper\AB::generate(16),
                    $data,
                    $b=rand(1998,2018),
                    $data,
                    $data
                );
                $statement->execute();
                $book[] = $statement->insert_id;
            } catch (\Exception $e) {
                //gagal update
            }
        }

        //kategori
        for($i=0; $i<$total_category; $i++) {
            try {
                $statement = \Sistem\Base::get_db()->prepare("INSERT INTO kategori (nama) VALUES(?)");
                $data=\Helper\AB::generate(4);
                $statement->bind_param(
                    "s",
                    $data
                );
                $statement->execute();
                $kategori[] = $statement->insert_id;
            } catch (\Exception $e) {
                //gagal update
            }
        }

        //peminjaman
        shuffle($user_id);
        shuffle($book);
        for($i=0; $i<$total_pinjam; $i++) {
            $statement = \Sistem\Base::get_db()->prepare("INSERT INTO peminjaman (tanggal_pinjam, tanggal_kembali, tanggal_deadline, id_buku, id_anggota) VALUES(?, ?, ?, ?, ?)");            
            $tanggal_pinjam = strtotime("-" . rand(4, 98) . " day");
            $tanggal_kembali = strtotime("+" . rand(3,14) . " day", $tanggal_pinjam);
            $tanggal_deadline = strtotime("+" . rand(7, 30) . " day", $tanggal_pinjam);
            $statement->bind_param(
                "sssss",
                $tanggal_pinjam=date("Y-m-d", $tanggal_pinjam),
                $tanggal_kembali=date("Y-m-d", $tanggal_kembali),
                $tanggal_deadline=date("Y-m-d", $tanggal_deadline),
                $book[$i],
                $user_id[$i]
            );
            $statement->execute();
        }
        

        //kategori buku
        $kat = [];
        foreach($kategori as $kate) {
            for($i=0; $i<$total_book_per_category; $i++) {
                $kat[$kate][$book[$i]] = true;
            }
            shuffle($book);
        }
        foreach($kat as $k=>$a) {
            foreach($a as $b=>$c){
                $statement = \Sistem\Base::get_db()->prepare("INSERT INTO kategoribuku (id_buku, id_kategori) VALUES(?, ?)");            
                $statement->bind_param("ii", $k, $b);
                $statement->execute();
            }
        }

        \Helper\Msg::add("Faker creation finished.", "is-info");
        return self::get_faker();
    }
}