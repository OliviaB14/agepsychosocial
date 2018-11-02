@extends('layouts.app')

@section('title')
    Calculer l'âge psycho-social
@endsection

@section('css-links')
    <link rel="stylesheet" href="{{ asset('css/calcul.css') }}">
@endsection

@section('content')
    <div class="row justify-content-center">

        @empty($res)
        <section class="form-simple col-md-8 col-lg-6 col-xl-6 card">
            <div class="card-header m-0">
                <h1 class="col-12 text-center">Calculer l'âge psycho-social</h1>
            </div>
            <div class="card-body">
                {!! Form::open(['url' => '/calcul', 'method' => 'post']) !!}
                <div class="form-group row">
                    {!! Form::label('age_reel', 'Âge réel', ['class' => 'col-sm-4 col-form-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('age_reel', '', ['class' => 'form-control']) !!}
                        <small class="form-text text-muted">
                            Entrer votre âge réel.
                            @foreach($errors->get('age_reel') as $message)
                                <span class="text-danger">{{ $message }}</span>
                            @endforeach
                        </small>
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('resultat_f1', 'Résultat RLRI16', ['class' => 'col-sm-4 col-form-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('resultat_f1', '', ['class' => 'form-control']) !!}
                        <small class="form-text text-muted">
                            Min: 0 | Max: 16
                            @foreach($errors->get('resultat_f1') as $message)
                                <span class="text-danger">{{ $message }}</span>
                            @endforeach
                        </small>
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('resultat_f2', 'Résultat Mémoire des chiffres', ['class' => 'col-sm-4 col-form-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('resultat_f2', '', ['class' => 'form-control']) !!}
                        <small class="form-text text-muted">
                            Min: 0 | Max: 9
                            @foreach($errors->get('resultat_f2') as $message)
                                <span class="text-danger">{{ $message }}</span>
                            @endforeach
                        </small>
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('resultat_f3', 'Résultat WCST', ['class' => 'col-sm-4 col-form-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('resultat_f3', '', ['class' => 'form-control']) !!}
                        <small class="form-text text-muted">
                            Min: 0 | Max: 6
                            @foreach($errors->get('resultat_f3') as $message)
                                <span class="text-danger">{{ $message }}</span>
                            @endforeach
                        </small>
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('resultat_f4', 'Résultat au test des cloches', ['class' => 'col-sm-4 col-form-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('resultat_f4', '', ['class' => 'form-control']) !!}
                        <small class="form-text text-muted">
                            Min: 0 | Max: 35
                            @foreach($errors->get('resultat_f4') as $message)
                                <span class="text-danger">{{ $message }}</span>
                            @endforeach
                        </small>
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('resultat_f5', 'Résultat au test des faux pas', ['class' => 'col-sm-4 col-form-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('resultat_f5', '', ['class' => 'form-control']) !!}
                        <small class="form-text text-muted">
                            Min: 0 | Max: 120
                            @foreach($errors->get('resultat_f5') as $message)
                                <span class="text-danger">{{ $message }}</span>
                            @endforeach
                        </small>
                    </div>
                </div>
                {!! Form::submit('Lancer le calcul!', ['class' => 'btn btn-light-green col-12 form-control']) !!}

                {!! Form::close() !!}
            </div>

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
                   <img src="{{asset('img/calcul.jpg')}}" class="img-fluid result">
               </div>
           </div>
        @endisset
    </div>
@endsection