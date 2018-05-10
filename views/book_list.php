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
                    <div class="column">
                        <h2 class="is-title">Book List</h2>
                    </div>
                    <div class="column has-text-right">
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
                                <button class="button is-BLACK">
                                SEARCH
                                </button>
                            </p>
                        </div>
                        </form>
                    </div>
                </div>
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
                            <td><?= $book['category'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?= $this->include("_part/footer.php"); ?>
</body>
</html>