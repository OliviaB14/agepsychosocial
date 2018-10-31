<?php

namespace AgePsychoSocial\Http\Controllers;

use AgePsychoSocial\Article;
use Illuminate\Http\Request;

class ProductionsController extends Controller
{
    public function index()
    {
        $articles = Article::where('draft', 0)->get();
        return view('pages.productions', [
            'articles' => $articles
        ]);
    }
}
