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



</head>
<body>
    <div id="app">
        @include('includes.navbar')
        <main class="py-4">
            <div class="container-fluid">
                @yield('content')
            </div>
        </main>
        @include('includes.footer')
    </div>
</body>
</html>
