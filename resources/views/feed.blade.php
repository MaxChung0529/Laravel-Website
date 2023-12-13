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
                <a href="{{ route('user.logout') }}"><button class="button">Log Out</button></a>
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

                    <p class="postTitle">&#60;&#60;{{$post->post_title}}&#62;&#62;</p>

                    <div id="captionContainer">
                        {{$post->caption}}
                    </div>

                    @if (Auth::user()->id == $post->users_id || Auth::user()->role == 'Admin')
                    <div class="actions">
                        <button class="edit" id="editPost">Edit Post</button>
                        <a href="{{ route('post.destroy', ['id' => $post->id]) }}"><button class="edit"
                                id="delete-post">Delete
                                Post</button></a>
                    </div>
                    @endif

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

                        @if (Auth::user()->id == $comment->users_id || Auth::user()->role == 'Admin')
                        <div class="actions">
                            <button class="edit" onclick="showEditComment('{{$comment->id}}')">Edit
                                Comment</button>
                            <a href="{{ route('comment.destroy', ['id' => $comment->id]) }}"><button class="edit"
                                    id="delete-comment">Delete
                                    Comment</button></a>
                        </div>
                        @endif
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

                    @if (Auth::user()->id == $post->users_id || Auth::user()->role == 'Admin')
                    <div class="actions">
                        <button class="edit" id="editPost">Edit Post</button>
                        <a href="{{ route('post.destroy', ['id' => $post->id]) }}"><button class="edit" id="delete-post"
                                onclick="return confirm('Are you sure you want to delete this post?')">Delete
                                Post</button></a>
                    </div>
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

                        @if (Auth::user()->id == $comment->users_id || Auth::user()->role == 'Admin')
                        <div class="actions">
                            <button class="edit" onclick="showEditComment('{{$comment->id}}')">Edit
                                Comment</button>
                            <a href="{{ route('comment.destroy', ['id' => $comment->id]) }}"><button class="edit"
                                    id="delete-comment"
                                    onclick="return confirm('Are you sure you want to delete this comment?')">Delete
                                    Comment</button></a>
                        </div>
                        @endif
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
                    success: function (data) {
                        if (data.error != '') {
                            $('#comment_form')[0].reset();
                            $('#comment_message').html(data.error);
                            $('#comment_id').val('0');
                            load_comment();
                        }
                    }
                })
            });
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

        $("#editPost").click(function () {
            alert('We are working on it! Please wait for the next patch!')
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
            window.location.reload();
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