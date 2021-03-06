<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            Âge Pyscho-social
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                @auth
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="m-3">Tableau de bord</a>
                    </li>
                @endauth
                {{--<li class="nav-item">
                    <a href="{{ route('origines') }}">Les origines de l'âge psychosocial</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('presentation') }}">Qui sommes-nous ?</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('potentiel') }}">Le potentiel d'adaptation</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('interpretation') }}">Interprétation et limites</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('formule') }}">Construction de la formule</a>
                </li>
                --}}
                <li class="nav-item">
                    <a href="{{ route('productions') }}">Productions scientifiques</a>
                </li>
                <li class="nav-item" id="aps-button">
                    <a href="{{ route('calcul') }}"><i class="fas mr-2 fa-calculator"></i>Calculer l'âge psycho-social</a>
                </li>
            </ul>
        </div>
    </div>
</nav>