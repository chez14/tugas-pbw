<div class="column is-3">
    <nav class="panel">
        <p class="panel-heading">
            Quick Menu
        </p>
        <a class="panel-block<?= $active_link=="book-list"?" is-active": "" ?>" href="/books">
            Book List
        </a>
        <a class="panel-block<?= $active_link=="book-borrow"?" is-active": "" ?>" href="/books/borrow">
            Borrowing History
        </a>
        <?php if(\Model\User::fetch_user()['is_admin']): ?>
        <a class="panel-block<?= $active_link=="member"?" is-active": "" ?>" href="/admin/list?is_admin=0">
            Member List
        </a>
        <a class="panel-block<?= $active_link=="adminstator"?" is-active": "" ?>" href="/admin/list?is_admin=1">
            Administrator List
        </a>
        <?php endif; ?>
        <a class="panel-block<?= $active_link=="journal"?" is-active": "" ?>" href="/journals">
            Download Journals
        </a>
        <?php if(\Model\User::fetch_user()['is_admin']): ?>
        <a class="panel-block<?= $active_link=="faker"?" is-active": "" ?>" href="/admin/faker">
            Data Faker
        </a>
        <?php endif; ?>
    </nav>
</div>