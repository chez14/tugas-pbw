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
        <a href="/" class="navbar-item">
            <i class="fas fa-home"></i> Home
        </a>
        <a href="/" class="navbar-item">
            <i class="far fa-newspaper"></i> News
        </a>
    </div>

    <div class="navbar-end">
        <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link" href="javascript:;">
                Hai <?=\Model\User::fetch_user()['nama']?>!
            </a>
            <div class="navbar-dropdown is-boxed">
                <a class="navbar-item" href="/user/profil">
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