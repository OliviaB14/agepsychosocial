<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    @include('includes.head')
    @yield('css-links')
    <link rel="stylesheet" href="{{ asset('css/back.css') }}">
</head>

<body>

<div id="app">
    @include('includes.navbar')
    <main class="py-0">
        <div class="container-fluid">
            <div class="row">
                <div class="sidebar col-md-1">
                    <div class="row">
                        <p class="text-center font-weight-bold col-12">{{ $user->first_name }}, vous êtes connecté(e).</p>
                    </div>

                    <ul class="nav flex-column grey lighten-4 py-4 col-12">
                        <div class="row justify-content-center text-center">
                            <li class="nav-item col-md-12 col-sm-2 col-2">
                                <a href="{{ route('home') }}" class="nav-link" data-tooltip="Voir le site" data-position="right" class="right">
                                    <img src="{{ asset('img/icons/see.svg') }}" alt="Voir le site">
                                </a>
                            </li>
                            <li class="nav-item col-md-12 col-sm-2 col-2">
                                <a class="nav-link" href="{{ route('dashboard') }}" data-tooltip="Profil" data-position="right" class="right">
                                    <img src="{{ asset('img/icons/avatar.svg') }}" alt="Profil">
                                </a>
                            </li>
                            <li class="nav-item col-md-12 col-sm-2 col-2">
                                <a class="nav-link" href="{{ route('create_article') }}" data-tooltip="Écrire un article" data-position="right" class="right">
                                    <img src="{{ asset('img/icons/edit.svg') }}" alt="Écrire un article">
                                </a>
                            </li>
                            <li class="nav-item col-md-12 col-sm-2 col-2">
                                <a class="nav-link" href="{{ route('show_articles') }}" data-tooltip="Tous les articles" data-position="right" class="right">
                                    <img src="{{ asset('img/icons/articles.svg') }}" alt="Tous les articles">
                                </a>
                            </li>
                            <li class="nav-item col-md-12 col-sm-2 col-2">
                                <a class="nav-link" href="http://creativebloom.fr" target="_blank" data-tooltip="creativebloom.fr" data-position="right" class="right">
                                    <img src="{{ asset('img/icons/help.svg') }}" alt="Contacter creativebloom.fr">
                                </a>
                            </li>
                            <li class="nav-item col-md-12 col-sm-2 col-2">
                                <a class="nav-link"  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" data-tooltip="Déconnexion" data-position="right" class="right">
                                    <img src="{{ asset('img/icons/logout.svg') }}" alt="Déconnexion">
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                            </li>
                        </div>
                        
                    </ul>
                </div>
                <div class="col-md-11">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>
