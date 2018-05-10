<?php
Namespace Controller;
class books {
    public function get_index() {
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

        \Sistem\View::render("book_list.php",[
            "books"=>$books,
            "allow_search"=>$by
        ]);        
    }

    public function get_borrow() {
        $query = \Sistem\Base::get_db()->query("SELECT buku.*, 
            peminjaman.*, 
            (peminjaman.tanggal_kembali - peminjaman.tanggal_deadline) as x_overdue, 
            ((peminjaman.tanggal_kembali - peminjaman.tanggal_deadline) * 1) as fine
            FROM peminjaman left join buku on buku.id=peminjaman.id_buku");
        \Sistem\View::render("book_borrow.php",[
            "books"=>\Helper\DB::fetch_all($query)
        ]);        
    }
}