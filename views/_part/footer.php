<?php 
    $script_mandatory = ["/assets/js/app.js"];
    $scripts = isset($scripts)?$scripts:[];
    $scripts = array_merge($script_mandatory, $scripts);
?>
<script defer src="//use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<?php foreach($scripts as $s): ?>
<script src="<?= $s ?>"></script>
<?php endforeach; ?>