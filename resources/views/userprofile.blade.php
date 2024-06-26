<!DOCTYPE html>
<html>
<link rel="stylesheet" href="/feedStyle.css">

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <div id="head">
        <a href="feed" style="color: black; text-decoration: none">

            <h1 class="h1H" style="color: white; font-size: 80px;">FakeBook</h1>

        </a>
    </div>

</head>

<body>

    <div id="container">
        <div id="profile-page-popup-bg" class="popup-bg">
            <div id="profile-page-container">
                <div onclick="hideProfile()">
                    <img id="exit_profile" src="pic/exit.png">
                </div>
                <form action="update-profile.php" method="POST" enctype="multipart/form-data">

                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                    <div class="profile-page-row">
                        <h3 class="profile-page-titles">Profile picture:</h3>
                        <img class="profile-page-avatar" src="{{App\Models\Users::find(Auth::id())->avatar}}">

                        <br>

                        <input type="file" accept="image/*" name="new-avatar" id="selectImage"
                            placeholder="Choose new avatar">
                    </div>

                    <br>

                    <br>

                    <div class="profile-page-row">
                        <h3 class="profile-page-titles">Profile name:</h3>
                        <h2>{{App\Models\Users::find(Auth::id())->user_name}}</h2>
                        <input type="text" name="new-userName" class="profile-input-box" placeholder="New Username">
                    </div>

                    <br><br>

                    <button class="button">Update</button>

                </form>
            </div>
        </div>

        <div id="edit-post-popup-bg" class="popup-bg">
            <div id="edit-post-container">
                <div onclick="hideEditPost()">
                    <img id="exit_profile" src="pic/exit.png">
                </div>
                <br><br>
                <div class="edit-post-row">
                    <h2>Post title:</h2>

                </div>

                <button class="button">Update</button>

                </form>
            </div>
        </div>

        <div id="menu">

            <div id="profileSplitter" class="menuButtons">
                <button onclick="showProfile()" class="menuButtons">
                    <img src="{{Auth::user()->avatar}}" id="profileAvatar">
                    <p>{{Auth::user()->user_name}}</p>
                </button>
            </div>

            <div id="feedSplitter" class="menuButtons">
                <a href="/feed" style="text-decoration: none;">
                    <button class="button">Feed</button>
                </a>
            </div>

            <div id="notificationSplitter" class="menuButtons">
                <a href="/notifications" style="text-decoration: none;">
                    <button class="button">Notifications</button>
                </a>
            </div>

            <div id="createPostSplitter" class="menuButtons">
                <a href="/createPost" style="text-decoration: none;">
                    <button class="button">Create Post</button>
                </a>
            </div>

            <div id="logoutSplitter" class="menuButtons">
                <a href="logout"><button class="button">Log Out</button></a>
            </div>
        </div>

        <div id="feedContainer">
            @foreach ($posts as $post)
            <div id="sectionContainer">


                @if ($post->image != '')
                <div id="postContainerWithImage">

                    <div id="profileContainer">

                        <img src="{{App\Models\Users::find($post->users_id)->avatar}}" class="profilePic">

                        <div id="userNameContainer">

                            <a href="{{ route('user.view', ['id' => $post->users_id]) }}" id="name"
                                style="color: black; text-decoration: none">
                                <b>{{App\Models\Users::find($post->users_id)->user_name}}</b>
                            </a>
                            <div class="time">{{$post->created_at}}</div>

                        </div>

                    </div>

                    <div id="picContainer">
                        <img src="{{$post->image}}" class="img">
                    </div>

                    @if (!App\Models\Like::where('posts_id',$post->id)->where('users_id',Auth::id())->get()->first())
                    <button class="like" id="like" value="{{$post->id}}">Like</button>
                    @else
                    <button class="liked" id="unlike" value="{{$post->id}}">Liked</button>
                    @endif

                    <p class="postTitle">&#60;&#60;{{$post->post_title}}&#62;&#62;</p>

                    <div id="captionContainer">
                        {{$post->caption}}
                    </div>

                    <div class="actions">
                        @if (Auth::user()->id == $post->users_id || Auth::user()->role == 'Admin')
                        <button class="edit" id="editPost">>Edit
                            Post</button>
                        @endif


                        @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Cleaner' || Auth::user()->id ==
                        $post->users_id)
                        <a href="{{ route('post.destroy', ['id' => $post->id]) }}"><button class="edit"
                                id="delete-post">Delete
                                Post</button></a>
                        @endif
                    </div>

                </div>

                <div id="commentContainer">
                    <h1>Comments</h1>
                    <div id="open-comment-box" onclick="showCommentBox('{{$post->id}}')">
                        <button id="small-button">Make your comment</button>
                    </div>
                    @foreach ($post->comments()->get() as $comment)

                    <div id="commentWrapper">
                        <div id="comment-profile-wrapper">
                            <img class="comment-avatar" src="{{App\Models\Users::find($comment->users_id)->avatar}}">
                            {{App\Models\Users::find($comment->users_id)->user_name}}
                        </div>
                        <div class="comment">{{$comment->comment}}</div>

                        <div class="actions">
                            @if (Auth::user()->id == $comment->users_id || Auth::user()->role == 'Admin' || Auth::user()->id == $comment->users_id)
                            <button class="edit" onclick="showEditComment('{{$comment->id}}')">Edit
                                Comment</button>
                            @endif

                            @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Cleaner' || Auth::user()->id == $comment->users_id)
                            <a href="{{ route('comment.destroy', ['id' => $comment->id]) }}"><button class="edit"
                                    id="delete-comment">Delete
                                    Comment</button></a>
                            @endif
                        </div>
                    </div>

                    @endforeach

                </div>
                @else
                <div id="postContainerWithoutImage">

                    <div id="profileContainer">

                        <img src="{{App\Models\Users::find($post->users_id)->avatar}}" class="profilePic">

                        <div id="userNameContainer">

                            <a href="{{ route('user.view', ['id' => $post->users_id]) }}" id="name"
                                style="color: black; text-decoration: none">
                                <b>{{App\Models\Users::find($post->users_id)->user_name}}</b>
                            </a>
                            <div class="time">{{$post->created_at}}</div>

                        </div>

                    </div>

                    <p class="postTitle">&#60;&#60;{{$post->post_title}}&#62;&#62;</p>

                    <div id="captionContainer">
                        {{$post->caption}}
                    </div>

                    <div class="actions">
                        @if (Auth::user()->id == $post->users_id || Auth::user()->role == 'Admin')
                        <button class="edit" id="editPost">Edit
                            Post</button>
                        @endif

                        @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Cleaner' || Auth::user()->id ==
                        $post->users_id)
                        <a href="{{ route('post.destroy', ['id' => $post->id]) }}"><button class="edit" id="delete-post"
                                onclick="return confirm('Are you sure you want to delete this post?')">Delete
                                Post</button></a>
                        @endif
                    </div>

                    @if (!App\Models\Like::where('posts_id',$post->id)->where('users_id',Auth::id())->get()->first())
                    <button class="like" id="like" value="{{$post->id}}">Like</button>
                    @else
                    <button class="liked" id="unlike" value="{{$post->id}}">Liked</button>
                    @endif

                </div>

                <div id="commentContainerWithoutImage">
                    <h1>Comments</h1>
                    <div id="open-comment-box" onclick="showCommentBox('{{$post->id}}')">
                        <button id="small-button">Make your comment</button>
                    </div>
                    @foreach ($post->comments()->get() as $comment)

                    <div id="commentWrapper">
                        <div id="comment-profile-wrapper">
                            <img class="comment-avatar" src="{{App\Models\Users::find($comment->users_id)->avatar}}">
                            {{App\Models\Users::find($comment->users_id)->user_name}}
                        </div>
                        <div class="comment">{{$comment->comment}}</div>

                        <div class="actions">
                            @if (Auth::user()->id == $comment->users_id || Auth::user()->role == 'Admin' || Auth::user()->id == $comment->users_id)
                            <button class="edit" onclick="showEditComment('{{$comment->id}}')">Edit
                                Comment</button>
                            @endif

                            @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Cleaner' || Auth::user()->id == $comment->users_id)
                            <a href="{{ route('comment.destroy', ['id' => $comment->id]) }}"><button class="edit"
                                    id="delete-comment"
                                    onclick="return confirm('Are you sure you want to delete this comment?')">Delete
                                    Comment</button></a>
                            @endif
                        </div>
                    </div>

                    @endforeach

                </div>
                @endif
                <div id="make-comment-popup-bg" class="popup-bg">
                    <div id="make-comment-box">
                        <div onclick="hideCommentBox()">
                            <img id="exit" src="pic/exit.png">
                        </div>
                        <h2>MAKE YOUR COMMENTS HERE!</h2>
                        <br><br><br>
                        <form method="POST" id="comment_form">

                            <input type="hidden" name="_token" value="{{csrf_token()}}">

                            <h3>Comment:</h3>

                            <input class="txtBox" type="text" id="comment" name="comment"
                                placeholder="Type your comment here">
                            <br><br>
                            <input type="hidden" id="posts_id" name="posts_id" value="">
                            <br>

                            <button id="return" class="submitButtons" onclick="hideCommentBox()">Return</button>
                            <button id="comment-submit" class="submitButtons">Post Comment</button>
                        </form>
                    </div>
                </div>

                <div id="edit-comment-popup-bg" class="popup-bg">
                    <div id="make-comment-box">
                        <div onclick="hideEditComment()">
                            <img id="exit" src="pic/exit.png">
                        </div>
                        <h2>EDIT YOUR COMMENTS HERE!</h2>
                        <br><br><br>
                        <form action="{{ route('comment.edit')}}" method="POST">

                            <input type="hidden" name="_token" value="{{csrf_token()}}">

                            <h3>New Comment:</h3>

                            <input class="txtBox" id="newComment" type="text" name="newComment" value="">
                            <br><br>
                            <input type="hidden" id="comment_id" name="comment_id" value="">
                            <br>

                            <button id="return" class="submitButtons" onclick="hideEditComment()">Return</button>
                            <button id="edit-comment-submit" class="submitButtons">Update Comment</button>
                        </form>
                    </div>
                </div>

            </div>
            @endforeach
            <span>
                {{$posts->links()}}
            </span>
            @foreach ($user->comments()->get() as $comment)
            <div id="sectionContainer">
                <div class="profileComment">

                    <div id="profileContainer">

                        <img src="{{$user->avatar}}" class="profilePic">

                        <div id="userNameContainer">

                            <a href="{{ route('user.view', ['id' => $post->users_id]) }}" id="name"
                                style="color: black; text-decoration: none">
                                <b>{{App\Models\Users::find($post->users_id)->user_name}}</b>
                            </a>

                        </div>

                    </div>
                    <p>POST ID: {{$comment->posts_id}}</p>
                    <br>
                    <i>COMMENT: "{{$comment->comment}}"</i>
                </div>

            </div>
            @endforeach
        </div>

    </div>

    <script>

        $(document).ready(function () {

            $('#comment_form').on('submit', function (event) {
                event.preventDefault();
                var form_data = $(this).serialize();
                $.ajax({
                    url: "{{ route('comment.add') }}",
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: form_data,
                    dataType: "JSON",
                    success: function (data, status, xhr) {
                        $("#body").val("");
                        alert("comment added successfully");
                        window.location.reload();
                    },
                })
            });
        });


        $(document).on('click', '#like', function () {
            $(this).removeClass("like")
            $(this).text("Liked")
            $(this).attr({ "id": "unlike", "class": "liked" })
            $.ajax({
                type: "get",
                url: "/like/{postID}",
                data: {
                    postID: $(this).val(), // < note use of 'this' here
                },
            });
        });


        $(document).on('click', '#unlike', function () {
            $(this).removeClass("liked")
            $(this).text("Like")
            $(this).attr({ "id": "like", "class": "like" })
            $.ajax({
                type: "get",
                url: "/unlike/{postID}",
                data: {
                    postID: $(this).val(), // < note use of 'this' here
                },
            });
        });


        $("#editPost").click(function () {
            alert('We are working on it! Please wait for the next patch!')
        });

        $("#comment-submit").click(function () {
            var comment = $("#comment").val();

            if (comment == "") {
                alert("Comment cannot be empty!!!");
                return false;
            } else {
                hideCommentBox();
            }
        });

        $("#edit-comment-submit").click(function () {
            var comment = $("#newComment").val();

            if (comment == "") {
                alert("Comment cannot be empty!!!");
                return false;
            } else {
                hideEditComment();
            }
        });

        function showCommentBox(x) {
            document.getElementById("make-comment-popup-bg").style.visibility = "visible";
            var tmp = document.getElementById("posts_id");
            tmp.value = x;
        }

        function hideCommentBox() {
            var element = document.getElementById("make-comment-popup-bg");
            if (element.style.visibility == "hidden")
                element.style.visibility = "visible";
            else
                element.style.visibility = "hidden";
        }

        function showEditComment(id) {
            document.getElementById("edit-comment-popup-bg").style.visibility = "visible";
            var commentID = document.getElementById("comment_id");
            commentID.value = id;
        }

        function hideEditComment() {
            var element = document.getElementById("edit-comment-popup-bg");
            if (element.style.visibility == "hidden")
                element.style.visibility = "visible";
            else
                element.style.visibility = "hidden";
        }

        function showProfile() {
            document.getElementById("profile-page-popup-bg").style.visibility = "visible";

        }

        function hideProfile() {
            var element = document.getElementById("profile-page-popup-bg");
            if (element.style.visibility == "hidden")
                element.style.visibility = "visible";
            else
                element.style.visibility = "hidden";
        }
    </script>
</body>

</html>