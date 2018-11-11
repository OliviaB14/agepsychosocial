@extends('layouts.back')

@include('includes.helpers_functions')

@section('css-links')
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    <link rel="stylesheet" href="{{ asset('css/back.css') }}">
@endsection

@section('content')

<section class="">
    <div class="row main-row mb-3">
        <h2 class="h1-responsive font-weight-bold text-center col-6">{{count($articles)}}
            @if(count($articles)>1)
                articles
            @else
                article
            @endif
        </h2>
        <div class="col-6">
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Rechercher un article" title="">
        </div>
    </div>
    <!-- Control buttons -->
    <div id="myBtnContainer">
        <div class="row justify-content-center">
            <button class="btn all active col-md-3" onclick="filterSelection('all')"> Tous les articles</button>
            <button class="btn published col-md-3" onclick="filterSelection('published')"> Publiés</button>
            <button class="btn draft col-md-3" onclick="filterSelection('draft')"> Brouillons</button>
        </div>
    </div>

    <hr class="my-3">

    <ul class="list-unstyled row" id="articles-list">
        @foreach($articles as $article)
            <li class="filterDiv col-12 {{ $article->published ? 'published' : 'draft' }}">
                <div class="row">
                    <div class="col-4 col-md-6 col-lg-5 col-xl-4 text-center">
                        <div class="view overlay rounded mb-lg-0 row">
                            <div class="col-md-12">
                                <img src="{{ url("article/$article->id/image") }}" class="img-fluid img-thumbnail">
                                <a>
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>

                        </div>
                        <div class="row justify-content-centerd">
                            <div class="col-md-4">
                                <a class="btn action-btn btn-sm btn-block info-color" href="{{ route('show_article', [$article->id]) }}" data-tooltip="Voir l'article" data-position="right" class="right">
                                    <i class="far fa-2x fa-eye text-white"></i>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a class="btn action-btn btn-sm btn-block default-color" href="{{ route('edit_article', ['id' => $article->id]) }}" data-tooltip="Éditer l'article" data-position="right" class="right">
                                    <i class="fas fa-2x fa-pen text-white"></i>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a class="btn action-btn btn-sm btn-block danger-color" data-toggle="modal" data-target="#exampleModal" data-tooltip="Supprimer l'article" data-position="right" class="right">
                                    <i class="fas fa-2x fa-trash-alt text-white"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-8 col-md-6 col-lg-7 col-xl-8 article">
                        <div class="row h-100">
                            <div class="col-md-12">
                                <div class="row text-center">
                                    <div class="status col-md-3 align-middle {{ $article->published ? 'status_published' : 'status_draft' }}">
                                        <span>{{ $article->published ? 'Publié' : 'Brouillon' }}</span>
                                    </div>
                                    <h3 class="font-weight-bold col-6 col-sm-6 col-md-6"><strong>{{ $article->title }}</strong></h3>
                                    <p class="col-6 col-sm-6 col-md-3 article_date">{{ $article->created_at->toDatestring() }}</p>
                                </div>
                                <div class="row article-content">
                                    <div class="col-md-12 dark-grey-text my-3 text-center">
                                        @isset($article->text)
                                            <?php
                                            echo myTruncate(html_entity_decode($article->text), 120);
                                            ?>
                                        @else
                                            <span class="font-italic">L'article est vide.</span>
                                        @endisset
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-5">
            </li>
        @endforeach
    </ul>
</section>

@if(count($articles) != 0)
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Suppression de l'article {{$article->title}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Êtes-vous sûr(e) de votre choix ? L'article sera définitivement supprimé.</p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('delete_article', ['id' => $article->id]) }}" method="post">
                    {!! method_field('delete') !!}
                    {!! csrf_field() !!}
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>

            </div>
        </div>
    </div>
</div>
@endif

<script src="{{ asset('js/filter_articles.js') }}"></script>
@endsection