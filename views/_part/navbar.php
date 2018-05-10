<?php
    $active_link = isset($active_link)?$active_link:"";
?>
<nav class="navbar is-black" role="navigation" aria-label="main navigation">
  <div class="container">
    <div class="navbar-brand">
        <a class="navbar-item" href="/">
        eLibrary
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        </a>
    </div>
  <div class="navbar-menu">
    <div class="navbar-start">
        <a href="/" class="navbar-item<?= $active_link=="home"?" is-active": "" ?>">
            <i class="fas fa-home"></i>
        </a>
        <a href="/news" class="navbar-item<?= $active_link=="news"?" is-active": "" ?>">
            <i class="fas fa-newspaper"></i>
        </a>
        <a href="/" class="navbar-item<?= $active_link=="email"?" is-active": "" ?>">
            <i class="fas fa-envelope"></i>
        </a>
    </div>

    <div class="navbar-end">
        <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link" href="javascript:;">
                Hai <?=\Model\User::fetch_user()['nama']?>!
            </a>
            <div class="navbar-dropdown is-boxed">
                <a class="navbar-item<?= $active_link=="profil"?" is-active": "" ?>" href="/user/profil">
                    Profil
                </a>
                <hr class="navbar-divider">
                <a class="navbar-item" href="/user/logout">
                    Logout
                </a>
            </div>
        </div>
    </div>
    </div>
</div>
</nav>
