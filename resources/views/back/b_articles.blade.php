@extends('layouts.back')

@section('css-links')
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
@endsection

@section('content')

    <section class="my-5">

        <!-- Section heading -->
        <h2 class="h1-responsive font-weight-bold text-center my-5">Recent posts</h2>
        <!-- Section description -->
        <p class="text-center dark-grey-text w-responsive mx-auto mb-5">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

        @foreach($articles as $article)
            <div class="row">
                <div class="col-lg-5 col-xl-4">

                    <!-- Featured image -->
                    <div class="view overlay rounded z-depth-1-half mb-lg-0 mb-4">
                        <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Others/images/49.jpg" alt="Sample image">
                        <a>
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>

                </div>
                <div class="col-lg-7 col-xl-8">

                    <!-- Post title -->
                    <h3 class="font-weight-bold mb-3"><strong>{{ $article->title }}</strong></h3>
                    <!-- Excerpt -->
                    <p class="dark-grey-text">
                        <?php
                            echo myTruncate(html_entity_decode($article->content), 100);
                        ?>
                    </p>
                    <!-- Post data -->
                    <p>Écrit par <a class="font-weight-bold">{{ $article->user_id }}</a>, {{ $article->created_at->toDatestring() }}</p>
                    <!-- Read more button -->
                    <a class="btn btn-primary btn-md" href="/dashboard/article/{{$article->id}}">Read more</a>

                </div>
                <!-- Grid column -->

            </div>
            <hr class="my-5">

        @endforeach

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

@endsection