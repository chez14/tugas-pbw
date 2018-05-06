<?php
    $css_default = [
        "https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css",
        "/assets/styles/style.css"
    ];
    $css = isset($css)?array_merge($css_default, $css):$css_default;
    $title = isset($title)?$title:"";
?>
    <title><?= $title ?></title>
    <?php foreach($css as $c): ?>
    <link rel="stylesheet" href="<?= $c ?>">
    <?php endforeach; ?>