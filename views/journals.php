<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?= $this->include("_part/header.php"); ?>
</head>
<body>
    <?= $this->include("_part/navbar.php", ['active_link'=>'journal']); ?>
    <div class="container">
        <div class="columns">
            <?= $this->include("_part/sidebar.php"); ?>       
            
            <div class="column">
                <div class="content">
                    <h2 class="is-title">Jurnal</h2>
                    <section class="section">
                        <?php foreach($journals as $jour): ?>
                        <a href="<?= $jour['file'] ?>" target="_blank">
                        <div class="card">
                            <div class="card-content">
                                <h4 class="title"><?= $jour['title'] ?></h4>
                                <h5 class="subtitle"><?= $jour['author'] ?></h5>
                                <p><?= $jour['desc'] ?></p>
                            </div>
                        </div>
                        </a>
                        <?php endforeach; ?>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <?= $this->include("_part/footer.php"); ?>
</body>
</html>