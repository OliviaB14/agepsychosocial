<?php

namespace AgePsychoSocial\Http\Controllers;

use AgePsychoSocial\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GestionController extends Controller
{

    public function index(){
        $users = User::all();

        $user = Auth::user();
        return view('admin.gestion', [
            'user' => $user,
            'users' => $users
        ]);
    }
}
