<?php

namespace AgePsychoSocial\Http\Controllers;

use AgePsychoSocial\Role;
use AgePsychoSocial\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;

class GestionController extends Controller
{

    public function index(){
        $roles = Role::all();
        $user = Auth::user();

        return view('admin.gestion', [
            'user' => $user,
            'roles' => $roles
        ]);
    }

    public function users(){
        $users = User::all();
        return $users->toJSON();
    }

    public function editUser(Request $request) {
        $data = User::find( $request->id );
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->email = $request->email;
        $data->save();
        return response ()->json ( $data );
    }

}
