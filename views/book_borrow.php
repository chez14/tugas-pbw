<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?= $this->include("_part/header.php"); ?>
</head>
<body>
    <?= $this->include("_part/navbar.php", ['active_link'=>'book-borrow']); ?>
    <div class="container">
        <div class="columns">
            <?= $this->include("_part/sidebar.php"); ?>       
            
            <div class="column content">
                <div class="columns">
                    <div class="column">
                        <h2 class="is-title">Book Borrow</h2>
                    </div>
                </div>
                <table class="table is-striped">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Borrow Date</th>
                            <th>Return Date</th>
                            <th>Overdue</th>
                            <th>Fine</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($books as $book): ?>
                        <tr>
                            <td><?= $book['code'] ?></td>
                            <td><?= $book['title'] ?></td>
                            <td><?= $book['author'] ?></td>
                            <td><?= $book['tanggal_pinjam'] ?></td>
                            <td><?= $book['tanggal_kembali'] ?></td>
                            <td><?= $book['x_overdue']>0?$book['x_overdue']:0 ?></td>
                            <td><?= $book['fine']>0?$book['fine']:0 ?></td>
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