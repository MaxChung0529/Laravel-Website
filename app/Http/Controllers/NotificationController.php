<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;
use App\Models\Posts;

class NotificationController extends Controller
{
    //
    public function addNotification($comment_id)
    {

        $comment = Comments::findOrFail($comment_id);

        $notification = new Notification();
        $notification -> from_id = $comment -> users_id;
        $notification -> to_id = Posts::findOrFail($comment->posts_id)->users_id;
        $notification -> comments_id = $comment_id;

        $notification->save();

        return view('feed');
    }

    public function getNotifications() {

        $user_id = Auth::id();

        $notifications = Notification::where('to_id',$user_id)->get();

        return view('notification', ['notifications' => $notifications]);
    }
}
