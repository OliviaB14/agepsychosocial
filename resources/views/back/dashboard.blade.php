@extends('layouts.back')

@section('css-links')
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
@endsection
@section('content')
    <h4>Modifier mes informations</h4>
    {!! Form::model($user, ['url' => ['/user/update', $user->id]]) !!}
    <div class="form-group row justify-content-center">
        {!! Form::label('first_name', 'Prénom', ['class' => 'col-3 text-center']) !!}
        <div class="col-6">
            {!! Form::text('first_name') !!}
        </div>
    </div>
    <div class="form-group row justify-content-center">
        {!!  Form::label('last_name', 'Nom', ['class' => 'col-3 text-center']) !!}
        <div class="col-6">
            {!!  Form::text('last_name') !!}
        </div>
    </div>
    <div class="form-group row justify-content-center">
        {!!  Form::label('password', 'Nouveau mot de passe', ['class' => 'col-3 text-center']) !!}
        <div class="col-6">
            {!! Form::password('password') !!}
        </div>
    </div>
    <div class="form-group row justify-content-center">
        {!!  Form::label('cpassword', 'Confirmer le nouveau mot de passe', ['class' => 'col-3 text-center']) !!}
        <div class="col-6">
            {!! Form::password('cpassword') !!}
        </div>
    </div>
    <div class="form-group row mt-5 justify-content-center">
        {!! Form::submit('Modifier', ['class' => 'btn btn-success col-6']) !!}
    </div>
    {!! Form::close() !!}
@endsection