<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a href="{{ route('user.dashboard') }}" class="nav-link">Tableau de bord</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('ideas.mine') }}" class="nav-link">Mes idées</a>
        </li>
        <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="nav-link btn btn-link" style="display: inline; padding: 0; margin: 0;">Déconnexion</button>
            </form>
        </li>
    </ul>
</nav>
