<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?= $this->include("_part/header.php"); ?>
</head>
<body>
    <div class="container">
        <?= $this->include("_part/kepala.php"); ?>        
        <div class="columns">
            <div class="column">
                <section class="section has-text-centered">
                    <?php $this->include("_part/message.php") ?>
                    <a href="/user/signup" class="button is-dark">Sign Up</a>
                    <a href="/user/login" class="button is-dark">Login</a>
                </section>
            </div>
        </div>
    </div>
    <?= $this->include("_part/footer.php"); ?>
</body>
</html>