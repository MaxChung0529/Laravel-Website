<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PostsController extends Controller
{
    //
    public function create(Request $request)
    {

        $request->validate([
            "post_title" => ['required'],
            'caption' => ['nullable'],
            'image' => ['nullable', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        $user_id = Auth::id();

        $post = new Posts();
        $post->post_title = $request->input('post_title');
        $post->caption = $request->input('caption');
        $post->users_id = $user_id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $image->move('images',$filename);
        }

        $post->img_path = '/public/images/' . $filename;
        $post->setCreatedAt(Carbon::now());
        $post->save();

        return redirect('/feed')->with('success', 'Post creation successful');
    }
}
