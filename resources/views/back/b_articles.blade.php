@extends('layouts.back')

@section('css-links')
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">



@endsection

@section('content')

    <section class="my-5">

        <!-- Section heading -->
        <div class="row main-row">
            <h2 class="h1-responsive font-weight-bold text-center col-6">{{count($articles)}} articles</h2>
            <div class="col-6">
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Rechercher un article" title="">
                <p class="text-center dark-grey-text w-responsive mx-auto mb-5">Rechercher un article par son titre</p>
            </div>
        </div>



        <ul class="list-unstyled" id="articles-list">

            @foreach($articles as $article)
                <li>
                    <div class="row">
                        <div class="col-lg-5 col-xl-4">

                            <div class="view overlay rounded z-depth-1-half mb-lg-0 mb-4">
                                <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Others/images/49.jpg" alt="Sample image">
                                <a>
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>

                        </div>
                        <div class="col-lg-7 col-xl-8">


                            <h3 class="font-weight-bold mb-3"><strong>{{ $article->title }}</strong></h3>

                            <p class="dark-grey-text">
                                <?php
                                echo myTruncate(html_entity_decode($article->content), 100);
                                ?>
                            </p>

                            <p>{{ $article->created_at->toDatestring() }}</p>

                            @auth
                                <a class="action-btn btn" href="/dashboard/admin/article/{{$article->id}}">
                                    <img src="{{ asset('img/icons/edit.png') }}" class="img-fluid">Éditer l'article
                                </a>
                            @endauth
                            <a class="btn action-btn" href="/dashboard/article/{{$article->id}}">
                                <img src="{{ asset('img/icons/see.png') }}" class="img-fluid">Voir l'article
                            </a>

                        </div>
                        <!-- Grid column -->

                    </div>
                    <hr class="my-5">
                </li>


            @endforeach
        </ul>


    </section>
    <!-- Section: Blog v.3 -->

    <?php function myTruncate($string, $limit, $break=".", $pad="...")
    {
        // return with no change if string is shorter than $limit
        if(strlen($string) <= $limit) return $string;

        // is $break present between $limit and the end of the string?
        if(false !== ($breakpoint = strpos($string, $break, $limit))) {
            if($breakpoint < strlen($string) - 1) {
                $string = substr($string, 0, $breakpoint) . $pad;
            }
        }

        return $string;
    } ?>

    <script src="{{asset('js/search_articles.js')}}"></script>

@endsection