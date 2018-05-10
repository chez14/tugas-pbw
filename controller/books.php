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
        \Sistem\View::render("book_list.php",[
            "books"=>\Helper\DB::fetch_all($query),
            "allow_search"=>$by
        ]);        
    }
}