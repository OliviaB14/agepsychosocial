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
                            <tbody>
                            @foreach($users as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{$item->first_name}}</td>
                                <td>{{$item->last_name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->role->title}}</td>
                                <td>
                                    <button data-target="#exampleModal"  data-user="{{$item}}" data-toggle="modal" class="edit-modal btn btn-info"
                                        <span class="glyphicon glyphicon-edit"></span> Edit
                                    </button>
                                    <button class="delete-modal btn btn-danger"
                                            >
                                        <span class="glyphicon glyphicon-trash"></span> Delete
                                    </button></td>
                            </tr>
                            </tbody>
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLabel">New message</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="md-form">
                                                    <input type="text" class="form-control" id="recipient-name">
                                                </div>
                                                <div class="md-form">
                                                    <textarea type="text" id="message-text" class="form-control md-textarea" rows="3"></textarea>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Send message</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script>

        $(document).ready(function() {
            $('#table').DataTable();

        } );

        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var user = button.data('user');
            var recipient = user['first_name']; // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this);
            modal.find('.modal-title').text('New message to ' + recipient);
            modal.find('.modal-body input').val(recipient);
        });


    </script>
</body>
</html>