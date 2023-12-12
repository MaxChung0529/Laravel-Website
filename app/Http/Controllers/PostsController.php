<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Notification;
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
            "post_title" => ['nullable'],
            'captionBox' => ['nullable'],
            'image' => ['nullable', 'mimes:jpg,jpeg,png'],
        ]);

        $user_id = Auth::id();

        $post = new Posts();
        $post->post_title = $request->input('post_title');
        $post->caption = $request->input('captionBox');
        $post->users_id = $user_id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $image->move('images', $filename);
            $post->image = 'images/' . $filename;
        }

        $post->setCreatedAt(Carbon::now());
        $post->save();

        return redirect('/feed');
    }

    public function getPosts(Request $request)
    {
        $posts = Posts::paginate(5);
        return view('feed', ['posts' => $posts]);
    }

    public function editPosts(Request $request)
    {
    }

    public function deletePosts($id)
    {
        Posts::where('id',$id)->delete();
        return redirect('/feed');
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

        if ($user_id !== (Posts::find($comment->posts_id)->users_id)) {
            $notification_controller = new NotificationController;
            $notification_controller->addNotification($comment->id);
        }

        return redirect()->back();
    }

    public function editComment(Request $request)
    {

        $request->validate([
            "newComment" => ['required'],
        ]);

        $comment_id = $request->input('comment_id');

        $comment = Comments::find($comment_id);

        if ($comment) {

            $comment->comment = $request->input('newComment');

        }
        $comment->save();
        return redirect()->back();
    }

    public function getComments(Request $request)
    {
        $comments = Comments::all();
        return view('feed', ['comments' => $comments]);
    }

    public function deleteComments($id)
    {
        Comments::where('id',$id)->delete();
        return redirect('/feed');
    }
}
