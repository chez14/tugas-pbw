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
        <div class="columns">
            <div class="column">
                <section class="hero is-dark is-berbackground">
                    <div class="hero-body has-text-centered">
                        <h1 class="title">
                            eLiblary
                        </h1>
                    </div>
                </section>
            </div>
        </div>
        <div class="columns is-centered">
            <div class="column is-4">
                <section class="section has-text-centered">
                    <div class="panel">
                        <div class="panel-heading">Create New Account</div>
                        <div class="panel-block">
                            <form action="/user/register" method="post" class="control">
                                <div class="field">
                                    <label class="label">Username</label>
                                    <div class="control">
                                        <input class="input" type="text" placeholder="Text input">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Password</label>
                                    <div class="control">
                                        <input class="input" type="password" placeholder="Text input">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Confirm Password</label>
                                    <div class="control">
                                        <input class="input" type="password" placeholder="Text input">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Name</label>
                                    <div class="control">
                                        <input class="input" type="text" placeholder="Text input">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Phone</label>
                                    <div class="control">
                                        <input class="input" type="phone" placeholder="Text input">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Address</label>
                                    <div class="control">
                                        <input class="input" type="text" placeholder="Text input">
                                    </div>
                                </div>
                                <div class="control">
                                    <button class="button is-primary">Register</button>
                                    <a href="/" class="button">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <?= $this->include("_part/footer.php"); ?>
</body>
</html>