<div class="column is-3">
    <nav class="panel">
        <p class="panel-heading">
            Quick Menu
        </p>
        <a class="panel-block<?= $active_link=="book-list"?" is-active": "" ?>" href="/books">
            Book List
        </a>
        <a class="panel-block<?= $active_link=="book-borrow"?" is-active": "" ?>" href="/borrows">
            Borrowing History
        </a>
        <a class="panel-block<?= $active_link=="journal"?" is-active": "" ?>" href="/journal">
            Download Journals
        </a>
        <?php if(\Model\User::fetch_user()['is_admin']): ?>
        <a class="panel-block<?= $active_link=="journal"?" is-active": "" ?>" href="/admin/faker">
            Data Faker
        </a>
        <?php endif; ?>
    </nav>
</div>