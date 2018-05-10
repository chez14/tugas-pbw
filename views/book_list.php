<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?= $this->include("_part/header.php"); ?>
</head>
<body>
    <?= $this->include("_part/navbar.php", ['active_link'=>'book-list']); ?>
    <div class="container">
        <div class="columns">
            <?= $this->include("_part/sidebar.php"); ?>       
            
            <div class="column content">
                <div class="columns">
                    <div class="column is-3">
                        <h2 class="is-title">Book List</h2>
                    </div>
                    <div class="column has-text-right is-9">
                        <form action="#" method="get">
                        <div class="field has-addons has-addons-right">
                            <p class="control">
                                <input class="input" type="text" placeholder="Search books..." name="q" required>
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
                            <?php if(\Model\User::fetch_user()['is_admin']):?>
                            <p class="control" data-trigger="new-book">
                                <a class="button is-primary">
                                Add New
                                </a>
                            </p>
                            <?php endif; ?>
                        </div>
                        </form>
                    </div>
                </div>
                <?= $this->include("_part/message.php"); ?>
                <table class="table is-striped">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Publication Year</th>
                            <th>Publisher</th>
                            <th>Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($books as $book): ?>
                        <tr>
                            <td><?= $book['code'] ?></td>
                            <td><?= $book['title'] ?></td>
                            <td><?= $book['author'] ?></td>
                            <td><?= $book['publication_year'] ?></td>
                            <td><?= $book['publisher'] ?></td>
                            <td>
                                <div class="tags">
                                <?php foreach($book['kategori'] as $kat): ?>
                                    <span class="tag"><?= $kat['nama'] ?></span>    
                                <?php endforeach;?>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal" id="new-book">
        <div class="modal-background"></div>
        <div class="modal-content">
            <div class="card">
                <div class="card-content">
                    <h3 class="title">Add new Book</h3>
                    <form action="#" method="post">
                        <div class="field">
                            <div class="control">
                                <input class="input" type="text" name="title" placeholder="title" required>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <input class="input" type="text" name="author" placeholder="author" required>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <input class="input" type="text" name="publication_year" placeholder="publication_year" required>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <input class="input" type="text" name="publisher" placeholder="publisher" required>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <div class="select is-multiple">
                                    <select multiple size="3" name="category[]">
                                        <?php foreach($categories as $cat): ?>
                                        <option value="<?= $cat['id'] ?>"><?= $cat['nama'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button class="button">Add</button>
                    </form>
                </div>
            </div>
        </div>
        <button class="modal-close is-large" data-trigger="close-modal" aria-label="close"></button>
    </div>
    <?= $this->include("_part/footer.php"); ?>

    <script>
        $(document).ready(()=>{
            $("[data-trigger='new-book']").click(function(e){
                $("#new-book").addClass("is-active");
            });
        });
    </script>
</body>
</html>