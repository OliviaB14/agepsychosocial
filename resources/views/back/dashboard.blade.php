@extends('layouts.back')

@section('css-links')
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
@endsection
@section('content')
    <div class="row mb-3 main-row">
        <div class="col-1 mt-2">
            <img src="{{ asset('img/icons/avatar.svg') }}" alt="Profil">
        </div>
        <h4 class="col-11 h1-responsive">Modifier mes informations</h4>
    </div>

    @isset($success)
        <div class="row justify-content-center">
            <div class="alert alert-success col-8" role="alert">
                {{$success}}
            </div>
        </div>
    @endisset

    @isset($error)
        <div class="row justify-content-center">
            <div class="alert alert-danger col-8" role="alert">
                {{$error}}
            </div>
        </div>
    @endisset

    <div class="row mt-5 justify-content-center">
        <div class="col-md-8 card">
            <div class="card-body">
                {!! Form::model($user, ['route' => ['update_user', $user->id]]) !!}
                <div class="form-group row justify-content-center">
                    {!! Form::label('first_name', 'Prénom', ['class' => 'col-3']) !!}
                    <div class="col-6">
                        {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group row justify-content-center">
                    {!!  Form::label('last_name', 'Nom', ['class' => 'col-3']) !!}
                    <div class="col-6">
                        {!!  Form::text('last_name', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group row justify-content-center">
                    {!!  Form::label('email', 'Adresse e-mail', ['class' => 'col-3']) !!}
                    <div class="col-6">
                        {!!  Form::text('email', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group row mt-5 justify-content-center">
                    {!! Form::submit('Modifier', ['class' => 'btn btn-success col-md-6']) !!}
                </div>
                <div class="row justify-content-center">
                    <a class="btn-flat mt-5" data-toggle="modal" data-target="#basicExampleModal">
                        <i class="text-info fa fa-user-lock mr-4"></i>Changer de mot de passe
                    </a>
                </div>
                {!! Form::close() !!}
            </div>

        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Changer le mot de passe
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['route' => ['update_user_password', $user->id]]) !!}

                <div class="modal-body row justify-content-center">
                    <div class="col-12">
                        <div class="form-group row justify-content-center">
                            {!!  Form::label('password', 'Nouveau mot de passe', ['class' => 'col-3']) !!}
                            <div class="col-6">
                                {!! Form::password('password', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            {!!  Form::label('password_confirmation', 'Confirmer le nouveau mot de passe', ['class' => 'col-3']) !!}
                            <div class="col-6">
                                {!! Form::password('password_confirmation', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    {!! Form::submit('Modifier', ['class' => 'btn btn-primary col-6']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection