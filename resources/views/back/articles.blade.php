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


        <!-- Control buttons -->
        <div id="myBtnContainer">
            <div class=" row justify-content-center mb-5">
                <button class="btn all active col-md-3" onclick="filterSelection('all')"> Tous les articles</button>
                <button class="btn published col-md-3" onclick="filterSelection('published')"> Publiés</button>
                <button class="btn draft col-md-3" onclick="filterSelection('draft')"> Brouillons</button>
            </div>
        </div>


    <div class="row">
        <ul class="list-unstyled col-12" id="articles-list">
            @foreach($articles as $article)
                <li class="filterDiv {{ $article->published ? 'published' : 'draft' }}">
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
                            <div class="row">
                                <div class="status col-2">
                                    @if($article->published)
                                        <span class='published p-3'>Publié</span>
                                    @else
                                        <span class='draft p-3'>Brouillon</span>
                                    @endif
                                </div>
                                <h3 class="font-weight-bold mb-3 col-6"><strong>{{ $article->title }}</strong></h3>
                                <p class="col-4 article_date">{{ $article->created_at->toDatestring() }}</p>
                            </div>
                            <div class="row">
                                <div class="article-content col-12 dark-grey-text">
                                    <?php
                                    echo myTruncate(html_entity_decode($article->text), 100);
                                    ?>
                                </div>
                            </div>
                            <div class="row">
                                <a class="btn action-btn col-md-3" href="{{ route('show_article', [$article->id]) }}">
                                    <img src="{{ asset('img/icons/see.svg') }}" class="img-fluid">Voir l'article
                                </a>
                                <a class="action-btn btn col-md-3" href="{{ route('edit_article', ['id' => $article->id]) }}">
                                    <img src="{{ asset('img/icons/edit.svg') }}" class="img-fluid">Éditer l'article
                                </a>
                                <a class="action-btn btn col-md-3 p-3" data-toggle="modal" data-target="#exampleModal">
                                    <img src="{{ asset('img/icons/delete.svg') }}" class="img-fluid">Supprimer l'article
                                </a>
                            </div>


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
                        </div>
                    </div>
                    <hr class="my-5">
                </li>
            @endforeach
        </ul>
    </div>

</section>
<script src="{{ asset('js/filter_articles.js') }}"></script>
@endsection