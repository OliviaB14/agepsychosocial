@extends('layouts.back')

@include('includes.helpers_functions')

@section('css-links')
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
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
                <p class="text-center w-responsive mx-auto">Rechercher un article par son titre</p>
            </div>
        </div>



        <ul class="list-unstyled" id="articles-list">
            @foreach($articles as $article)
                <li>
                    <div class="row">
                        <div class="col-lg-5 col-xl-4 text-center">
                            <div class="view overlay rounded mb-lg-0 mb-4">
                                <img src="{{ url("article/$article->id/image") }}" class="img-fluid img-thumbnail">
                                <a>
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-xl-8">
                            <div class="status d-inline">
                                @if($article->published)
                                    <span class='published'>Publié</span>
                                @else
                                    <span class='draft'>Brouillon</span>
                                @endif
                            </div>
                            <h3 class="font-weight-bold mb-3 d-inline-block"><strong>{{ $article->title }}</strong></h3>

                            <p>{{ $article->created_at->toDatestring() }}</p>

                            <div class="article-content dark-grey-text">
                                <?php
                                echo myTruncate(html_entity_decode($article->text), 100);
                                ?>
                            </div>


                            <a class="btn action-btn" href="{{ route('show_article', [$article->id]) }}">
                                <img src="{{ asset('img/icons/see.svg') }}" class="img-fluid">Voir l'article
                            </a>
                            @auth
                                <a class="action-btn btn" href="{{ route('edit_article', ['id' => $article->id]) }}">
                                    <img src="{{ asset('img/icons/edit.svg') }}" class="img-fluid">Éditer l'article
                                </a>
                                <a class="action-btn btn p-3" data-toggle="modal" data-target="#exampleModal">
                                    <img src="{{ asset('img/icons/delete.svg') }}" class="img-fluid">Supprimer l'article
                                </a>

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

                            @endauth
                        </div>
                    </div>
                    <hr class="my-5">
                </li>
            @endforeach
        </ul>
    </section>

@endsection