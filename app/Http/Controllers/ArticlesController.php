<?php

namespace AgePsychoSocial\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use AgePsychoSocial\Article;



class ArticlesController extends Controller
{

    private $Url;

    public function __construct()
    {
        //$this->middleware('auth');
        $this->Url = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
        $this->Url .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];

    }

    public function index(){
        $articles = Article::all();
        $user = Auth::user();
        return view('back.articles', [
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
            'user' => $user,
            'edit' => false,
            'url' => $this->Url
        ]);
    }

    public function show_edit($id){
        $user = Auth::user();
        $article = Article::find($id);
        return view('back.article', [
            'article' => $article,
            'user' => $user,
            'edit' => true,
            'url' => $this->Url
        ]);
    }

    public function delete($id){
        $to_delete = Article::find($id);
        $to_delete->delete();
        return redirect('dashboard/articles');
    }


}