@extends('layouts.back')

@section('css-links')
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector: "textarea",  // change this value according to your HTML
            plugins : 'advlist autolink link image lists charmap print preview',
            menubar: "insert",
            toolbar: "bold italic underline strikethrough | alignleft, aligncenter, alignright, alignjustify, formatselect, fontselect, fontsizeselect, cut, copy, paste, bullist, numlist, outdent, indent, blockquote, undo, redo, removeformat, subscript, superscript\n",
            });</script>
@endsection

@section('content')

        <div class="mt-3">
            {!! Form::open(['url' => '/articles/new', 'files' => true]) !!}
            <div class="form-group">
                {!! Form::label('title', 'Titre de l\'article') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('image', 'Image principale') !!}
                {!! Form::file('image', ['class' => 'form-control']); !!}
            </div>
            <div class="form-group">
                {!! Form::textarea('text', null, ['placeholder' => 'Description du projet']); !!}
            </div>
            {!! Form::submit('Publier', ['class' => 'btn btn-light-green btn-block']) !!}
            {!! Form::close() !!}
        </div>


@endsection