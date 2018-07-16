<?php

namespace AgePsychoSocial\Http\Controllers;

use Illuminate\Http\Request;

class PresentationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function origines()
    {
        return view('origines');
    }
    public function qui()
    {
        return view('presentation');
    }
    public function potentiel()
    {
        return view('potentiel');
    }
    public function interpretation()
    {
        return view('intepretation');
    }
    public function formule()
    {
        return view('formule');
    }

}
