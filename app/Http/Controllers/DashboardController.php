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
        $messages = [
            "required" =>     "Ce champ ne peut être vide.",
            "max"      =>     "Ce champ ne peut dépasser :max caractères.",
            "min"      =>     "Ce champ ne peut avoir moins de :min caractères.",
            "email"    =>     "Le format est incorrect.",
            "unique"   =>     "Cette adresse e-mail a déjà été utilisée.",
            "confirmed"=>     "Les mots de passe ne correspondent pas."

        ];

        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'nullable|string|min:6|confirmed',
        ], $messages);

        $user = Auth::user();

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        if(isset($request->password)){
            $user->password = $request->password;
        }


        $user->save();
        $success = "Modifications enregistrées.";
        return view('back.dashboard', [
            "success" => $success,
            "user" => $user
        ]);
    }
}