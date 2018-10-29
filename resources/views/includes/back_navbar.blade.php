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
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"><img src="{{ asset('img/icons/settings.png') }}" class="img-fluid"></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('home') }}">Voir le site</a>
                </li>
                {{--
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
                <li class="nav-item">
                    <a href="{{ route('productions') }}">Productions scientifiques</a>
                </li>--}}

            </ul>
        </div>
    </div>
</nav>