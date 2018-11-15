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
                            <h4 class="modal-title" id="editModalLabel">New message</h4>
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
                            <button type="button" class="btn btn-outline-success" data-dismiss="modal">
                                update
                            </button>
                            <button type="button" class="btn btn-primary">Send message</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
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