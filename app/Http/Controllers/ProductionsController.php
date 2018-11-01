<?php

namespace AgePsychoSocial\Http\Controllers;

use AgePsychoSocial\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
class ProductionsController extends Controller
{
    private $Url;

    public function __construct()
    {


        $this->Url = URL::current();;

    }

    public function index()
    {
        $articles = Article::where('published', 1)->get();
        return view('pages.productions', [
            'articles' => $articles,
        ]);
    }

    public function show($id){
        $article = Article::find($id);
        return view('pages.article', [
            'article' => $article,
            'url' => $this->Url
        ]);
    }
}
