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
                <div class="columns">
                    <div class="colum is-3">
                        <h3 class="title">User Manager</h3>
                    </div>
                    <div class="colum is-9 has-text-righted">
                        <form action="#" method="get">
                            <div class="field has-addons has-addons-right">
                                <p class="control">
                                    <input class="input" type="text" placeholder="Search user..." name="q" required>
                                </p>
                                <p class="control">
                                    <a class="button is-static">
                                        by
                                    </a>
                                </p>
                                <p class="control">
                                    <span class="select">
                                        <select name="by" required>
                                            <?php foreach($allow_search as $cat): ?>
                                            <option value="<?=$cat?>"<?= $_GET['by'] == $cat?" selected":""?>><?=$cat?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </span>
                                </p>
                                <p class="control">
                                    <button class="button is-black">
                                    SEARCH
                                    </button>
                                </p>
                                <?php if(\Model\User::fetch_user()['is_admin'] && $_GET['is_admin']):?>
                                <p class="control" data-trigger="new-user">
                                    <a class="button is-primary">
                                    Add New
                                    </a>
                                </p>
                                <?php endif; ?>
                            </div>
                                <input type="hidden" name="is_admin" value="<?= $_REQUEST['is_admin'] ?>">
                        </form>
                    </div>
                </div>
                <?= $this->include("_part/message.php"); ?>                
                <div class="content">
                    <table class="table is-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($users as $user): ?>
                            <tr>
                                <td><?= $user['id'] ?></td>
                                <td><?= $user['nama'] ?></td>
                                <td><?= $user['telepon'] ?></td>
                                <td><?= $user['alamat'] ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="new-user">
        <div class="modal-background"></div>
        <div class="modal-content">
            <div class="card">
                <div class="card-content">
                    <h3 class="title">Add new Admin</h3>
                    <form action="#" method="post">
                        <div class="field">
                            <div class="control">
                                <input class="input" type="text" name="name" placeholder="name" required>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <input class="input" type="text" name="username" placeholder="username" required>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <input class="input" type="text" name="phone" placeholder="phone" required>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <input class="input" type="text" name="address" placeholder="address" required>
                            </div>
                        </div>
                        <button class="button">Register</button>
                    </form>
                </div>
            </div>
        </div>
        <button class="modal-close is-large" data-trigger="close-modal" aria-label="close"></button>
    </div>
    <?= $this->include("_part/footer.php"); ?>
    <script>
        $(document).ready(function() {
            $("[data-trigger='new-user']").click(function(e){
                $("#new-user").addClass("is-active");
            })
        });
    </script>
</body>
</html>