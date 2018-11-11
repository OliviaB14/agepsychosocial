@extends('layouts.app')

@include('includes.helpers_functions')

@section('title')
    Productions scientifiques
@endsection

@section('css-links')
    <link rel="stylesheet" href="{{asset('css/productions.css')}}">
@endsection

@section('content')
    <section class="">
        <div class="row main-row mb-3">
            <h2 class="h1-responsive font-weight-bold text-center col-6">Productions scientifiques</h2>
            <div class="col-6">
                <input type="text" id="myInput" onkeyup="search_as_guest()" placeholder="Rechercher un article" title="">
            </div>
        </div>

        <div class="row" id="articles-list">
            @foreach($articles as $article)


                <div class="col-md-3 col-sm-12 index_div_item">
                    <a href="{{ route('guest_article', ['id' => $article->id]) }}">
                    <div class="card h-100 well">
                        <div class="single-post post-style-1 ">
                            <h1 class="h1_item p-3"><span class="titre_item">{{ $article->title }}</span></h1>

                            <div class="blog-image">
                                <img src="{{ url("article/$article->id/image") }}" alt="{{ $article->title }}" class="img-fluid">
                            </div>

                            <div class="blog-info py-2 px-2">
                                <?php  echo myTruncate(html_entity_decode($article->text), 100); ?>
                            </div><!-- blog-info -->
                        </div><!-- single-post -->

                    </div><!-- card -->
                    </a>
                </div><!-- col-md-6 col-sm-12 -->

            @endforeach


        </div>
    </section>


<script src="{{ asset('js/height.js') }}"></script>
<script src="{{asset('js/search_articles.js')}}"></script>
@endsection