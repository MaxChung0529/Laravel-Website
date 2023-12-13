<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Redirect;

class LoginController extends Controller
{
    //
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/feed');
        }

        return redirect('/login')->with('alert','Login Fail! Please check your details again!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/index');
    }
}
?>