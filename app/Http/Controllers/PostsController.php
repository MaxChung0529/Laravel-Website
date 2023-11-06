<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
    public function create(Request $request) {

        $post = new Posts();
        $post->userID = $request->input('user_id');
        $post->postTitle = $request->input('post_title');
        $post->path = $request->input('img_path');
        $post->save();
        
        return redirect('/feed')->with('success','Post creation successful');
    }
}
