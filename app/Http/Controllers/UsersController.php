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
            'UserName' => 'required | unique:users,UserName',
            'UserPw' => 'required',
        ]);

        $user = new Users();
        $user->UserName = $request->input('UserName');
        $user->UserPw = $request->input('UserPw');
        $user->save();

        return redirect('/feed')->with('success','Login Successful');
    }

    public function login(Request $request)
    {
        $request->validate([
            'UserName' => 'required',
            'UserPw' => 'required',
        ]);


        return redirect('/feed')->with('success','Login Successful');
    }
}
