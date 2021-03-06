<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?= $this->include("_part/header.php"); ?>
</head>
<body>
    <?= $this->include("_part/navbar.php", ['active_link'=>'home']); ?>
    <div class="container">
        <div class="columns">
            <?= $this->include("_part/sidebar.php"); ?>
            <div class="column">
                <h3 class="title">Welcome!</h3>
            </div>
        </div>
    </div>

    <?= $this->include("_part/footer.php"); ?>
</body>
</html>