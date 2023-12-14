<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;
use App\Models\Posts;

class NotificationController extends Controller
{
    //
    public function addNotification($type, $id)
    {


        if ($type == 'App\Models\Comments') {
            $comment = Comments::findOrFail($id);
            $notification = new Notification();
            $notification->from_id = $comment->users_id;
            $notification->to_id = Posts::findOrFail($comment->posts_id)->users_id;
            $notification->comments_id = $id;

            $notification->save();
        }else if ($type == 'App\Models\Like') {
            $like = Like::findOrFail($id);
            $notification = new Notification();
            $notification->from_id = $like->users_id;
            $notification->to_id = Posts::findOrFail($like->posts_id)->users_id;
            $notification->comments_id = -1;
        }

        return view('feed');
    }

    public function getNotifications()
    {

        $user_id = Auth::id();

        $notifications = Notification::where('to_id', $user_id)->get();

        return view('notification', ['notifications' => $notifications]);
    }
}
