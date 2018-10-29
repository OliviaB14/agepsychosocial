@extends('layouts.back')

@section('css-links')
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
@endsection

@section('content')

        <div class="mt-3">
            {!! Form::open(['url' => '/dashboard/articles/create']) !!}
            <div class="form-group">
                {!! Form::label('title', 'Titre de l\'article') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('main_img', 'Image principale') !!}
                {!! Form::file('main_img', ['class' => 'form-control']); !!}
            </div>
            <div class="form-group">
                {!! Form::textarea('text_content', null, ['placeholder' => 'Description du projet']); !!}
            </div>
            {!! Form::submit('Publier', ['class' => 'btn btn-light-green btn-block']) !!}
            {!! Form::close() !!}
        </div>


@endsection