<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Brick\Math\BigInteger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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
        $user->setCreatedAt(Carbon::now());


        if ($request->hasfile('avatar')) {
            $image = $request->file('avatar');
            $filename = $image->getClientOriginalName();
            $image->move('pic', $filename);
            $user->avatar = 'pic/' . $filename;
        }

        $user->save();

        return redirect('/login')->with('success', 'Account successfully created');
    }

    public function update(Request $request)
    {
        $request->validate([
            'new-userName' => 'nullable | unique:users,user_name',
            'new-avatar' => 'nullable',
        ]);

        $user = Users::find(Auth::id());

        if($request->has('new-userName')) {
            $user->user_name = $request->input('new-userName');
        }


        if ($request->hasfile('new-avatar')) {
            $image = $request->file('new-avatar');
            $filename = $image->getClientOriginalName();
            $image->move('pic', $filename);
            $user->avatar = 'pic/' . $filename;
        }

        $user->save();

        return redirect('/feed');
    }

    public function getDetail($id) {
        $user = Users::find($id);
        return view('userprofile',['user' => $user]);
    }
}