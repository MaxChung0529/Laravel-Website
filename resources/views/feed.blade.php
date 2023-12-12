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

            <div id="settingSplitter" class="menuButtons">
                <a href="/feed" style="text-decoration: none;">
                    <button class="button">Feed</button>
                </a>
            </div>

            <div id="profileSplitter" class="menuButtons">
                <button class="button" onclick="showProfile()">Profile</button>
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
            @foreach ($posts->reverse() as $post)
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

                        </div>

                    </div>

                    <div id="picContainer">
                        <img src="{{$post->image}}" class="img">
                    </div>

                    <p class="postTitle">&#60;&#60;{{$post->post_title}}&#62;&#62;</p>

                    <div id="captionContainer">
                        {{$post->caption}}
                    </div>

                    @if (Auth::user()->id == $post->users_id)
                    <div class="actions">
                        <a href="{{ route('post.edit', ['id' => $post->id]) }}"><button class="edit">Edit
                                Post</button></a>
                        <a href="{{ route('post.destroy', ['id' => $post->id]) }}"><button class="edit">Delete
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
                        <div id="comment">{{$comment->comment}}</div>

                        @if (Auth::user()->id == $comment->users_id)
                        <div class="actions">
                            <button class="edit" onclick="showEditComment('{{$comment->id}}')">Edit
                                Comment</button>
                            <a href="{{ route('comment.destroy', ['id' => $comment->id]) }}"><button class="edit">Delete
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

                        </div>

                    </div>

                    <p class="postTitle">&#60;&#60;{{$post->post_title}}&#62;&#62;</p>

                    <div id="captionContainer">
                        {{$post->caption}}
                    </div>

                    @if (Auth::user()->id == $post->users_id)
                    <div class="actions">
                        <a href="{{ route('post.edit', ['id' => $post->id]) }}"><button class="edit">Edit
                                Post</button></a>
                        <a href="{{ route('post.destroy', ['id' => $post->id]) }}"><button class="edit">Delete
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
                        <div id="comment">{{$comment->comment}}</div>

                        @if (Auth::user()->id == $comment->users_id)
                        <div class="actions">
                            <button class="edit" onclick="showEditComment('{{$comment->id}}')">Edit
                                Comment</button>
                            <a href="{{ route('comment.destroy', ['id' => $comment->id]) }}"><button class="edit">Delete
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

                            <input class="txtBox" type="text" id="txtBox" name="comment"
                                placeholder="Type your comment here">
                            <br><br>
                            <input type="hidden" id="posts_id" name="posts_id" value="">
                            <br>

                            <button id="small-button-submit" onclick="hideCommentBox()">Post Comment</button>
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

                            <button id="small-button" onclick="hideEditComment()">Post Comment</button>
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
                    url: "add_comment.php",
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

        selectImage.onchange = evt => {
            var preview = document.getElementById('preview-avatar');
            preview.style.display = 'block';
            const [file] = selectImage.files;
            if (file) {
                preview.src = file.getClientOriginalName;
            }
        }

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