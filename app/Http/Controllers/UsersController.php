<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    //

    public function index()
    {
        return view("/index");
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required | unique:users,email',
            'user_name' => 'required | unique:users,user_name',
            'password' => 'required',
        ]);

        $user = new Users();
        $user->email = $request->input('email');
        $user->user_name = $request->input('user_name');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect('/login')->with('success', 'Account successfully created');
    }
}