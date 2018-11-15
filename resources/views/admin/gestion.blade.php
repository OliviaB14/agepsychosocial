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
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet"
          href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    @yield('css-links')
    <link rel="stylesheet" href="{{ asset('css/back.css') }}">


</head>

<body>

    <div id="app">
        @include('includes.navbar')
        <main class="py-5">

            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="editModalLabel">Modifier l'utilisateur</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form>
                                @csrf
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input type="text" id="user_id" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <label for="user_first_name">Prénom</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" id="user_first_name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <label for="user_last_name">Nom</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" id="user_last_name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <label for="user_email_name">Adresse e-mail</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="email" id="user_email" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <label for="user_role">Rôle utilisateur</label>
                                    </div>
                                    <div class="col-md-10">
                                        <select class="browser-default custom-select" id="user-role">
                                            @foreach($roles as $role)
                                                <option value="{{$role->id}}">{{$role->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                            </form>

                        </div>
                        <div class="modal-footer">
                            <button type="button" id="update-button" class="btn btn-outline-success" data-dismiss="modal">
                                Modifier
                            </button>
                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Annuler</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="deleteModalLabel">Supprmer l'utilisateur</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form>
                            @csrf
                            <div class="modal-body">

                            </div>
                            <div class="modal-footer">
                                <button type="submit" id="delete_user_button" class="btn btn-outline-danger" data-dismiss="modal">
                                    Supprimer
                                </button>
                                <button type="button" class="btn btn-outline-info" data-dismiss="modal">Annuler</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="addModalLabel">Ajouter un utilisateur</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="POST" action="{{ url('/addUser') }}" aria-label="{{ __('Inscription') }}">

                        <div class="modal-body">
                                @csrf

                                <div class="form-group row">
                                    <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('Prénom') }}</label>

                                    <div class="col-md-6">
                                        <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required autofocus>

                                        @if ($errors->has('first_name'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                                    <div class="col-md-6">
                                        <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus>

                                        @if ($errors->has('last_name'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adresse e-mail') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">{{ __('Confirmer le mot de passe') }}</label>

                                    <div class="col-md-6">
                                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="add-button" class="btn btn-outline-success" data-dismiss="modal">
                                Ajouter
                            </button>
                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Annuler</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row justify-content-center mb-4">
                    <div class="col-md-4">
                        <button class="btn btn-info btn-block" data-toggle="modal" data-target="#addModal">Ajouter un utilisateur</button>
                    </div>
                </div>
                <div class="row justify-content-center">

                    <div class="col-md-10 table-responsive">
                        <table class="table text-center" id="table">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Prénom</th>
                                <th class="text-center">Nom</th>
                                <th class="text-center">Adresse e-mail</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="{{asset('js/users_gestion.js')}}"></script>
</body>
</html>