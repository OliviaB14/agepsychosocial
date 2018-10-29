<?php

namespace AgePsychoSocial\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use AgePsychoSocial\Article;



class ArticlesController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index(){
        $articles = Article::all();
        $user = Auth::user();
        return view('back.b_articles', [
            'articles' => $articles,
            'user' => $user
        ]);
    }

    public function createNew(){
        $user = Auth::user();
        return view('back.new_article', [
            'user' => $user
        ]);
    }

    public function create(Request $request){
        $request->validate([
            'title' => 'required|string',
            'content' => 'nullable|string'
        ]);
        $new = new Article();
        $new->title = $request->title;
        $new->content = $request->text_content;
        $new->user_id = (int) Auth::id();

        $new->save();

        return redirect('dashboard/articles');
    }

    public function show($id){
        $user = Auth::user();
        $article = Article::find($id);
        return view('back.article', [
            'article' => $article,
            'user' => $user
        ]);
    }


}