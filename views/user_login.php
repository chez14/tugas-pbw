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
        <div class="columns is-centered">
            <div class="column is-4">
                <section class="section">
                <div class="card">
                    <header class="card-header">
                        <p class="card-header-title">
                            Login
                        </p>
                    </header>
                    <div class="card-content">
                        <div class="content">
                            <?php $this->include("_part/message.php") ?>
                            <form action="/user/login" method="post">
                                <div class="field">
                                    <label class="label">Username</label>
                                    <div class="control">
                                        <input class="input" name="username" type="text" placeholder="Text input">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Password</label>
                                    <div class="control">
                                        <input class="input" name="password" type="password" placeholder="Text input">
                                    </div>
                                </div>
                                <div class="control">
                                    <button class="button is-primary">Login</button>
                                    <a href="/" class="button">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                </section>
            </div>
        </div>
    </div>
    <?= $this->include("_part/footer.php"); ?>
</body>
</html>