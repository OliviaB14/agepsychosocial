@extends('layouts.back')

@section('css-links')
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('css/new_article.css')}}">

    <script src="{{ asset('tinymce/tinymce.min.js') }}"></script>
    {{--<script>tinymce.init({ selector: "textarea",  // change this value according to your HTML
            plugins : 'advlist autolink link image lists print preview',
            menubar: "insert view",
            toolbar: "bold italic underline strikethrough | alignleft, aligncenter, alignright, alignjustify | formatselect, fontselect, fontsizeselect | cut, copy, paste, bullist, numlist, outdent, indent, blockquote, undo, redo, removeformat, subscript, superscript\n | preview",
            language: 'fr_FR'
        });
    </script>--}}

    <script src="{{ asset('js/init_editor.js') }}"></script>
@endsection

@section('content')
<div class="row">
    <h4>Créer un article</h4>
</div>
<div class="row justify-content-center">
    <div class="mt-3 col-md-8">
        {!! Form::open(['url' => '/articles/new', 'files' => true]) !!}
        <div class="form-group">
            {!! Form::label('title', 'Titre de l\'article*') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
            <small class="form-text text-muted">
                @foreach($errors->get('title') as $message)
                    <span class="text-danger">{{ $message }}</span>
                @endforeach
            </small>
        </div>
        <div class="form-group">
            <div class="input-group">
               <span class="input-group-btn">
                 <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                   <i class="fa fa-picture-o"></i> Choose
                 </a>
               </span>
                <input id="thumbnail" readonly class="form-control" type="text" name="filepath">
            </div>
            <small class="form-text text-muted">
                Taille maximale: Formats acceptés: jpeg, png, bmp, gif, svg.
                @foreach($errors->get('image') as $message)
                    <span class="text-danger">{{ $message }}</span>
                @endforeach
            </small>
            <img id="holder" style="margin-top:15px;max-height:100px;">
        </div>
        <div class="form-group">
            {!! Form::textarea('text', null, ['placeholder' => 'Description du projet']); !!}
        </div>
        <div class="form-group">
            <div class="wrap">
                <div class="block">
                    <input data-index="0" id="published" name="published" type="checkbox" />
                    <label for="published" id="status"></label>
                    <span class="text">Article à sauvegarder</span>
                </div>
            </div>
        </div>
        {!! Form::submit('Publier', ['class' => 'btn btn-light-green btn-block btn-lg']) !!}
        {!! Form::close() !!}
    </div>
</div>
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
<script src="{{ asset('js/new_article.js') }}"></script>

@endsection