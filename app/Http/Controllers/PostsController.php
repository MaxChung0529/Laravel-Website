<?php

namespace App\Http\Controllers;

use App\Models\Comments;
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
            'image' => ['nullable', 'mimes:jpg,jpeg,png'],
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

        $post->image = 'images/' . $filename;
        $post->setCreatedAt(Carbon::now());
        $post->save();

        return redirect('/feed');
    }

    public function getPosts(Request $request)
    {
        $posts = Posts::all();
        return view('feed', ['posts' => $posts]);
    }

    public function addComment(Request $request)
    {
        $request->validate([
            "comment" => ['required'],
        ]);

        $user_id = Auth::id();

        $comment = new Comments();
        $comment->comment = $request->input('comment');
        $comment->users_id = $user_id;
        $comment->posts_id = $request->input('posts_id');

        $comment->save();
        return redirect('/feed')->with('success', 'Post creation successful');
    }

    public function getComments(Request $request)
    {
        $comments = Comments::all();
        return view('feed', ['comments' => $comments]);
    }
}
