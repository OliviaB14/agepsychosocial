@extends('layouts.app')

@section('title')
    Calculer l'âge psycho-social
@endsection

@section('css-links')
    <style>
        .form-simple .font-small {
            font-size: 0.8rem; }

        .form-simple .header {
            border-top-left-radius: .3rem;
            border-top-right-radius: .3rem; }

        .form-simple input[type=text]:focus:not([readonly]) {
            border-bottom: 1px solid #ff3547;
            -webkit-box-shadow: 0 1px 0 0 #ff3547;
            box-shadow: 0 1px 0 0 #ff3547; }

        .form-simple input[type=text]:focus:not([readonly]) + label {
            color: #4f4f4f; }

        .form-simple input[type=password]:focus:not([readonly]) {
            border-bottom: 1px solid #ff3547;
            -webkit-box-shadow: 0 1px 0 0 #ff3547;
            box-shadow: 0 1px 0 0 #ff3547; }

        .form-simple input[type=password]:focus:not([readonly]) + label {
            color: #4f4f4f; }
    </style>
@endsection

@section('content')
    <div class="row justify-content-center">
        <h1 class="col-12 text-center">Calculer l'âge psycho-social</h1>
        @empty($res)
        <section class="form-simple col-6">
            {!! Form::open(['url' => '/calcul', 'method' => 'post']) !!}

            {!! Form::label('age_reel', 'Âge réel') !!}
            {!! Form::text('age_reel', '', ['class' => 'form-control']) !!}


            {!! Form::label('resultat_f1', 'Résultat RLRI16') !!}
            {!! Form::text('resultat_f1', '', ['class' => 'form-control']) !!}

            {!! Form::label('resultat_f2', 'Résultat Mémoire des chiffres') !!}
            {!! Form::text('resultat_f2', '', ['class' => 'form-control']) !!}

            {!! Form::label('resultat_f3', 'Résultat WCST') !!}
            {!! Form::text('resultat_f3', '', ['class' => 'form-control']) !!}

            {!! Form::label('resultat_f4', 'Résultat au test des cloches') !!}
            {!! Form::text('resultat_f4', '', ['class' => 'form-control']) !!}

            {!! Form::label('resultat_f5', 'Résultat au test des faux pas') !!}
            {!! Form::text('resultat_f5', '', ['class' => 'form-control']) !!}

            {!! Form::submit('Lancer le calcul!', ['class' => 'btn btn-light-green col-12 form-control']) !!}

            {!! Form::close() !!}
        </section>
            @endempty
        @isset($res)
            <div class="row justify-content-center">
                <div class="alert alert-success col-12" role="alert">
                    Votre âge réel est : {{$age_reel}}
                    Votre âge psycho-social est : {{$res}} !
                </div>
            </div>
           <div class="row justify-content-center">
               <div class="col-6">
                   <img src="{{asset('img/calcul.jpg')}}" class="img-fluid">
               </div>
           </div>

        @endisset
    </div>




@endsection