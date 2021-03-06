<?php

namespace AgePsychoSocial\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use AgePsychoSocial\Article;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;



class ArticlesController extends Controller
{

    private $Url;

    public function __construct()
    {
        //$this->middleware('auth');
        $this->Url = URL::current();;

    }

    public function index(){
        $articles = Article::paginate(10);
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
        $messages = [
            // required
            'title.required' => "Le titre ne peut être vide.",
            'image.required' => "L'image ne peut être vide.",

            // format
            'image' => "L'image doit correspondre aux formats suivants: jpeg, png, bmp, gif, ou svg."
        ];

        $request->validate([
            'title' => 'required|string',
            'text' => 'nullable',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif'
        ], $messages);
        $new = new Article();

        if($request->title != $new->title){
            $new->title = $request->title;
        }

        $new->text = $request->text;

        if(isset($request->filepath)) {
            $file = $request->filepath;
            // Get the contents of the file
            $contents = file_get_contents(URL::to('/').$file);
            $new->main_img = $contents;

        } else{
            // Get the contents of the file
            $contents = file_get_contents(URL::to('/')."/img/default.png");
            $new->main_img = $contents;
        }

        if($request->published == "on"){
            $new->published = 1;
        } else{
            $new->published = 0;
        }



        $new->user_id = (int) Auth::id();

        $new->save();

        return redirect(route('show_articles'));
    }

    public function update($id, Request $request){
        $article = Article::findOrFail($id);

        $article->title = $request->title;
        $article->text = $request->text;
        if(isset($request->image)){
            $file = $request->file('image');

            // Get the contents of the file
            $contents = $file->openFile()->fread($file->getSize());
            $article->main_img = $contents;
        }
        if($request->published == "on"){
            $article->published = 1;
        } else{
            $article->published = 0;
        }
        $article->save();
        return redirect(route('show_articles'));
    }

    public function show($id){
        $user = Auth::user();
        $article = Article::findOrFail($id);
        return view('back.article', [
            'article' => $article,
            'user' => $user,
            'edit' => false,
            'url' => $this->Url
        ]);
    }

    public function show_edit($id){
        $user = Auth::user();
        $article = Article::findOrFail($id);
        return view('back.article', [
            'article' => $article,
            'user' => $user,
            'edit' => true,
            'url' => $this->Url
        ]);
    }

    public function delete($id){
        $to_delete = Article::findOrFail($id);
        $to_delete->delete();
        return redirect(route('show_articles'));
    }



}