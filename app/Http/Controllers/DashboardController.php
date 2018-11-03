<?php

namespace AgePsychoSocial\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\ResetsPasswords;



class DashboardController extends Controller
{
    use ResetsPasswords;

    public $messages;

    public function __construct()
    {
        $this->messages = [
            "required" =>     "Ce champ ne peut être vide.",
            "max"      =>     "Ce champ ne peut dépasser :max caractères.",
            "min"      =>     "Ce champ ne peut avoir moins de :min caractères.",
            "email"    =>     "Le format est incorrect.",
            "unique"   =>     "Cette adresse e-mail a déjà été utilisée.",

        ];
    }

    public function index(){
        $user = Auth::user();
        return view('back.dashboard', [
            'user' => $user
        ]);
    }

    public function update($id, Request $request){


        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ], $this->messages);

        $user = Auth::user();

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;


        $user->save();
        $success = "Modifications enregistrées.";
        return view('back.dashboard', [
            "success" => $success,
            "user" => $user
        ]);
    }


    public function changePassword(Request $request){
        $user = Auth::user();
        $validatedData = $request->validate([
            'password' => 'required|string|min:6',
            'password_confirmation' => 'required|same:password',
        ], $this->messages);

        $this->resetPassword($user,$request->password);

        $success = "Mot de passe changé avec succès.";
        return view('back.dashboard', [
            "success" => $success,
            "user" => $user
        ]);
    }
}