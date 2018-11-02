
<footer class="page-footer font-small blue position-static">
    <div class="footer-copyright text-center py-3">© 2018 Copyright:
        <a href="http://creativebloom.fr/"> creativebloom.fr</a> @guest | <a href="/login">Connexion</a> @else
            <a class="nav-link"  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Déconnexion
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
        @endguest
    </div>
</footer>
