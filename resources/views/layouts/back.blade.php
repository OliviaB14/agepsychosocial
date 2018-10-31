<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.3/js/mdb.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.4/css/mdb.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    @yield('css-links')



</head>
<body>
<div id="app">
    @include('includes.navbar')
    <main class="py-0">
        <div class="container-fluid">
            <div class="row">
                <div class="sidebar col-1">
                    <p class="text-center font-weight-bold">{{ $user->first_name }}, vous êtes connecté(e).</p>

                    <ul class="nav flex-column grey lighten-4 py-4">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('dashboard') }}">
                                <img src="{{ asset('img/icons/avatar.svg') }}" alt="Profil">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('dashboard/articles/create') }}">
                                <img src="{{ asset('img/icons/edit.svg') }}" alt="Éditer le profil">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('dashboard/articles') }}">
                                <img src="{{ asset('img/icons/articles.svg') }}" alt="Tous les articles">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <img src="{{ asset('img/icons/logout.svg') }}" alt="Déconnexion">
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://creativebloom.fr">
                                <img src="{{ asset('img/icons/help.svg') }}" alt="Contacter creativebloom.fr">
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-11">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>
