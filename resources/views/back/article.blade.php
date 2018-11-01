@extends('layouts.back')

@section('css-links')
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('css/article.css')}}">


    <script src="{{ asset('tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('js/init_editor.js') }}"></script>
@endsection

@section('content')

    @if($edit)
        <div class="article">
            <div class="row main-row">
                <h3 class="col-12">Éditer l'article : <strong>{{ $article->title }}</strong></h3>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ url("article/$article->id/image") }}" class="img-thumbnail">
                    <p class="font-italic">Image actuelle</p>
                </div>
                <div class="mt-3 col-md-8">
                    {!! Form::model($article, ['route' => ['update_article', $article->id], 'files' => true, 'method' => 'put']) !!}
                    <div class="form-group">
                        {!! Form::label('title', 'Titre de l\'article') !!}
                        {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">

                        {!! Form::label('image', 'Changer l\'image principale') !!}
                        {!! Form::file('image', ['class' => 'form-control']); !!}
                    </div>
                    <div class="form-group">
                        {!! Form::textarea('text', null, ['placeholder' => 'Description du projet', 'rows' => '4']); !!}
                    </div>
                    <div class="form-group">
                        <div class="wrap">
                            <div class="block">
                                <input data-index="0" id="published" name="published" type="checkbox" />
                                <label for="published"></label>
                                <span>Publier l'article</span>
                            </div>
                        </div>
                    </div>
                    {!! Form::submit('Publier', ['class' => 'btn btn-light-green btn-block']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>


    @else
        <div class="row article-settings text-center justify-content-center p-4">

            <div class="col-3">
                <a href="{{ route('edit_article', ['id' => $article->id]) }}" class="my-btn">
                    <img src="{{ asset('img/icons/edit.svg') }}" class="img-fluid" title="Editer l'article">
                </a>
            </div>

            <div class="col-3">
                <div class="share-button">
                    <div class="share-button__back">
                        <a class="share__link" href="https://twitter.com/share?url={{$url}}" title="twitter">
                            <svg class="share__icon share__icon--twitter" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="49.652px" height="49.652px" viewBox="0 0 49.652 49.652" style="enable-background:new 0 0 49.652 49.652;" xml:space="preserve">
                                <g>
                                    <g>
                                        <path d="M24.826,0C11.137,0,0,11.137,0,24.826c0,13.688,11.137,24.826,24.826,24.826c13.688,0,24.826-11.138,24.826-24.826    C49.652,11.137,38.516,0,24.826,0z M35.901,19.144c0.011,0.246,0.017,0.494,0.017,0.742c0,7.551-5.746,16.255-16.259,16.255    c-3.227,0-6.231-0.943-8.759-2.565c0.447,0.053,0.902,0.08,1.363,0.08c2.678,0,5.141-0.914,7.097-2.446    c-2.5-0.046-4.611-1.698-5.338-3.969c0.348,0.066,0.707,0.103,1.074,0.103c0.521,0,1.027-0.068,1.506-0.199    c-2.614-0.524-4.583-2.833-4.583-5.603c0-0.024,0-0.049,0.001-0.072c0.77,0.427,1.651,0.685,2.587,0.714    c-1.532-1.023-2.541-2.773-2.541-4.755c0-1.048,0.281-2.03,0.773-2.874c2.817,3.458,7.029,5.732,11.777,5.972    c-0.098-0.419-0.147-0.854-0.147-1.303c0-3.155,2.558-5.714,5.713-5.714c1.644,0,3.127,0.694,4.171,1.804    c1.303-0.256,2.523-0.73,3.63-1.387c-0.43,1.335-1.333,2.454-2.516,3.162c1.157-0.138,2.261-0.444,3.282-0.899    C37.987,17.334,37.018,18.341,35.901,19.144z"></path>
                                    </g>
                                </g>
                            </svg>
                        </a>
                        <a class="share__link " href="http://www.facebook.com/sharer.php?u={{$url}}" title="facebook">
                            <svg class="share__icon share__icon--facebook" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="49.652px" height="49.652px" viewBox="0 0 49.652 49.652" style="enable-background:new 0 0 49.652 49.652;" xml:space="preserve">
                                <g>
                                    <g>
                                        <path d="M24.826,0C11.137,0,0,11.137,0,24.826c0,13.688,11.137,24.826,24.826,24.826c13.688,0,24.826-11.138,24.826-24.826    C49.652,11.137,38.516,0,24.826,0z M31,25.7h-4.039c0,6.453,0,14.396,0,14.396h-5.985c0,0,0-7.866,0-14.396h-2.845v-5.088h2.845    v-3.291c0-2.357,1.12-6.04,6.04-6.04l4.435,0.017v4.939c0,0-2.695,0-3.219,0c-0.524,0-1.269,0.262-1.269,1.386v2.99h4.56L31,25.7z    "></path>
                                    </g>
                                </g>
                            </svg>
                        </a>
                        <a class="share__link" href="https://plus.google.com/share?url={{$url}}">
                            <svg class="share__icon share__icon--google" version="1.1"xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="49.652px" height="49.652px" viewBox="0 0 49.652 49.652" style="enable-background:new 0 0 49.652 49.652;" xml:space="preserve">
                                <g>
                                    <g>
                                        <g>
                                            <path d="M21.5,28.94c-0.161-0.107-0.326-0.223-0.499-0.34c-0.503-0.154-1.037-0.234-1.584-0.241h-0.066     c-2.514,0-4.718,1.521-4.718,3.257c0,1.89,1.889,3.367,4.299,3.367c3.179,0,4.79-1.098,4.79-3.258     c0-0.204-0.024-0.416-0.075-0.629C23.432,30.258,22.663,29.735,21.5,28.94z"></path>
                                            <path d="M19.719,22.352c0.002,0,0.002,0,0.002,0c0.601,0,1.108-0.237,1.501-0.687c0.616-0.702,0.889-1.854,0.727-3.077     c-0.285-2.186-1.848-4.006-3.479-4.053l-0.065-0.002c-0.577,0-1.092,0.238-1.483,0.686c-0.607,0.693-0.864,1.791-0.705,3.012     c0.286,2.184,1.882,4.071,3.479,4.121H19.719L19.719,22.352z"></path>
                                            <path d="M24.826,0C11.137,0,0,11.137,0,24.826c0,13.688,11.137,24.826,24.826,24.826c13.688,0,24.826-11.138,24.826-24.826     C49.652,11.137,38.516,0,24.826,0z M21.964,36.915c-0.938,0.271-1.953,0.408-3.018,0.408c-1.186,0-2.326-0.136-3.389-0.405     c-2.057-0.519-3.577-1.503-4.287-2.771c-0.306-0.548-0.461-1.132-0.461-1.737c0-0.623,0.149-1.255,0.443-1.881     c1.127-2.402,4.098-4.018,7.389-4.018c0.033,0,0.064,0,0.094,0c-0.267-0.471-0.396-0.959-0.396-1.472     c0-0.255,0.034-0.515,0.102-0.78c-3.452-0.078-6.035-2.606-6.035-5.939c0-2.353,1.881-4.646,4.571-5.572     c0.805-0.278,1.626-0.42,2.433-0.42h7.382c0.251,0,0.474,0.163,0.552,0.402c0.078,0.238-0.008,0.5-0.211,0.647l-1.651,1.195     c-0.099,0.07-0.218,0.108-0.341,0.108H24.55c0.763,0.915,1.21,2.22,1.21,3.685c0,1.617-0.818,3.146-2.307,4.311     c-1.15,0.896-1.195,1.143-1.195,1.654c0.014,0.281,0.815,1.198,1.699,1.823c2.059,1.456,2.825,2.885,2.825,5.269     C26.781,33.913,24.89,36.065,21.964,36.915z M38.635,24.253c0,0.32-0.261,0.58-0.58,0.58H33.86v4.197     c0,0.32-0.261,0.58-0.578,0.58h-1.195c-0.322,0-0.582-0.26-0.582-0.58v-4.197h-4.192c-0.32,0-0.58-0.258-0.58-0.58V23.06     c0-0.32,0.26-0.582,0.58-0.582h4.192v-4.193c0-0.321,0.26-0.58,0.582-0.58h1.195c0.317,0,0.578,0.259,0.578,0.58v4.193h4.194     c0.319,0,0.58,0.26,0.58,0.58V24.253z"></path>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </a>
                        <a class="share__link" href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{$url}}" title="linkedin">
                            <svg height="67px" class="share__icon share__icon--linkedin" id="Layer_1" style="enable-background:new 0 0 67 67;" version="1.1" viewBox="0 0 67 67" width="67px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <path d="M49.837,48.137V36.425c0-6.275-3.35-9.195-7.816-9.195  c-3.604,0-5.219,1.983-6.119,3.374V27.71h-6.79c0.09,1.917,0,20.427,0,20.427h6.79V36.729c0-0.609,0.044-1.219,0.224-1.655  c0.49-1.22,1.607-2.483,3.482-2.483c2.458,0,3.44,1.873,3.44,4.618v10.929H49.837z M21.959,24.922c2.367,0,3.842-1.57,3.842-3.531  c-0.044-2.003-1.475-3.528-3.797-3.528s-3.841,1.524-3.841,3.528c0,1.961,1.474,3.531,3.753,3.531H21.959z M33,64  C16.432,64,3,50.568,3,34C3,17.431,16.432,4,33,4s30,13.431,30,30C63,50.568,49.568,64,33,64z M25.354,48.137V27.71h-6.789v20.427  H25.354z" style="fill-rule:evenodd;clip-rule:evenodd;fill:#FFF;"/>
                            </svg>
                        </a>
                    </div>
                    <div class="share-button__front">
                        <p class="share-button__text"> <img src="{{ asset('img/icons/share.svg') }}" class="img-fluid"></p>
                    </div>
                </div>

            </div>

            <div class="col-3" data-toggle="modal" data-target="#exampleModal">
                <img src="{{ asset('img/icons/delete.svg') }}" class="img-fluid" >
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
        <div class="article">
            <div class="card">
                <div class="card-body">
                    <h2>{{ $article->title }}</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ url("article/$article->id/image") }}">
                        </div>
                        <div class="col-md-6">
                            <?php echo html_entity_decode($article->text);?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection