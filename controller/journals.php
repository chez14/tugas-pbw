<?php
namespace Controller;
class journals {
    public static function get_index() {
        $journals = [
            [
                "title"=>"Journal 1",
                "subtitle"=>"Writer 1",
                "file"=>"/assets/journals/JOURNAL1.pdf",
                "desc"=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
            ],
            [
                "title"=>"Journal 2",
                "subtitle"=>"Writer 2",
                "file"=>"/assets/journals/JOURNAL2.pdf",
                "desc"=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
            ],
            [
                "title"=>"Journal 3",
                "subtitle"=>"Writer 3",
                "file"=>"/assets/journals/JOURNAL3.pdf",
                "desc"=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
            ],
        ];

        \Sistem\View::render("journals.php",[
            "journals"=>$journals
        ]);        
    }
}