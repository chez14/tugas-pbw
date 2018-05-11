<?php
Namespace Controller;
class books {
    public static function get_index() {
        $query = null;
        $by = ["title", "author", "publication_year", "publisher", "category"];
        if(isset($_GET['q']) && isset($_GET['by']) && in_array($_GET['by'], $by)) {
            $statement = \Sistem\Base::get_db()->prepare("SELECT * FROM buku WHERE " . $_GET['by'] . " like ?");
            $_GET['q'] = "%" . $_GET['q'] . "%";
            $statement->bind_param("s", $_GET['q']);
            $statement->execute();
            $query = $statement->get_result();
        } else {
            $query = \Sistem\Base::get_db()->query("SELECT * FROM buku");
        }
        $books = \Helper\DB::fetch_all($query);

        $books = array_map(function($buk) {
            $buk['kategori'] = \Helper\DB::fetch_all(\Sistem\Base::get_db()->query("SELECT * FROM kategoribuku left join kategori on kategoribuku.id_kategori = kategori.id where kategoribuku.id_buku = $buk[id]"));
            return $buk;
        }, $books);

        $categories = \Helper\DB::fetch_all(
            \Sistem\Base::get_db()
                ->query("SELECT * FROM kategori")
        );

        \Sistem\View::render("book_list.php",[
            "books"=>$books,
            "allow_search"=>$by,
            "categories"=>$categories
        ]);        
    }

    public static function post_index() {
        $statement = \Sistem\Base::get_db()->prepare("INSERT INTO buku (code, title, publication_year, author, publisher) values(?,?,?,?,?)");
        $statement->bind_param(
            "sssss",
            \Helper\AB::generate(10),
            $_POST['title'],
            $_POST['publication_year'],
            $_POST['author'],
            $_POST['publisher']
        );
        $statement->execute();
        $buku = $statement->insert_id;
        foreach($_POST['category'] as $cat) {
            $statement = \Sistem\Base::get_db()->prepare("INSERT INTO kategoribuku(id_buku, id_kategori) values(?,?)");
            $statement->bind_param("ii", $buku, $cat);
            $statement->execute();
        }
        \Helper\Msg::add("The book " . $_POST['title'] . " has been added successfully.", "is-info");
        return self::get_index();
    }

    public static function get_borrow() {
        $query = \Sistem\Base::get_db()->query("SELECT buku.*, 
            peminjaman.*, 
            DATEDIFF(peminjaman.tanggal_kembali,peminjaman.tanggal_deadline) as x_overdue, 
            (DATEDIFF(peminjaman.tanggal_kembali, peminjaman.tanggal_deadline) * 1) as fine
            FROM peminjaman left join buku on buku.id=peminjaman.id_buku");
        \Sistem\View::render("book_borrow.php",[
            "books"=>\Helper\DB::fetch_all($query)
        ]);        
    }
}