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
        <div class="columns has-text-centered">
            <?= $this->include("_part/sidebar.php"); ?>
            <div class="column">
                <h3 class="title">Faker</h3>
                <p>
                    Faker adalah alat untuk meng-generate data dummy ke dalam database secara dinamis.<br/>
                    Yang anda perlu lakukan adalah dengan mengklik tombol <strong>FAKE IT</strong>, maka data akan
                    otomatis di generasi secara backend.
                </p>
                <?= $this->include("_part/message.php"); ?>
                <form action="#" method="post" class="has-text-centered">
                    <button class="button is-danger"><i class="fas fa-exclamation-triangle"></i> FAKE IT</button>
                </form>
            </div>
        </div>
    </div>

    <?= $this->include("_part/footer.php"); ?>
</body>
</html>