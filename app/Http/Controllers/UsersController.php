<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

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
            'user_name' => 'required | unique:users,user_name',
            'user_password' => 'required',
        ]);

        $user = new Users();
        $user->UserName = $request->input('user_name');
        $user->UserPw = $request->input('user_password');
        $user->save();

        return redirect('/feed')->with('success','Login Successful');
    }

    public function login(Request $request)
    {
        $request->validate([
            'user_name' => 'required',
            'user_password' => 'required',
        ]);


        return redirect('/feed')->with('success','Login Successful');
    }
}
