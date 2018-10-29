<?php

namespace AgePsychoSocial\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index(){
        $user = Auth::user();
        return view('back.dashboard', [
            'user' => $user
        ]);
    }

    public function update($id, Request $request){
        $user = Auth::user();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;

        $user->save();
        return redirect('dashboard');
    }
}