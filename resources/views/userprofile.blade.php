<!DOCTYPE html>
<html>

<head>

    <style>
        * {
            margin: 0;
            padding: 0;
            border: 0;
            box-sizing: border-box;

            #head {
                width: 100%;
                height: 10vh;
                text-align: center;
                background-color: black;
            }

            #body {
                width: 100%;
                height: 90vh;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            #container {
                height: 90%;
                width: 100vw;
                display: flex;
                flex-direction: row;
            }

            #sectionContainer {
                height: 90vh;
                width: 75vw;
                display: flex;
                flex-direction: row;
                background-color: black;
            }

            #feedContainer {
                height: 90vh;
                width: 75vw;
                display: flex;
                flex-direction: column;
                overflow: hidden;
                overflow-y: scroll;
            }

            #postContainer {
                height: 90vh;
                width: 50vw;
                display: flex;
                align-items: center;
                flex-direction: column;
                background-color: whitesmoke;
            }

            #profileContainer {
                width: 50vw;
                height: 7vh;
                flex-direction: row;
                display: flex;
                border-bottom: #2f2f2f;
                border-style: solid;
                border-width: 2px;
            }

            #userNameContainer {
                margin-left: 10px;
                margin-top: 2px;
                height: 7vh;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            #name {
                font-size: 20px;
                font-family: Arial, Helvetica, sans-serif;
            }

            #name:hover {
                display: inline-block;
                transform: scale(1.1);
            }

            #picContainer {
                height: 63vh;
                width: 35vw;
                display: flex;
                align-items: center;
                justify-content: center;
                background-color: rgba(0, 0, 0, 0.05);
            }

            #captionContainer {
                width: 40vw;
                height: 20vh;
                font-size: 20px;
                padding-top: 2vh;
            }

            #commentContainer {
                height: 90vh;
                width: 25vw;
                text-align: center;
                background-color: white;
                box-sizing: border-box;
                border: 1px solid grey;
                display: flex;
                flex-direction: column;
            }

            #commentWrapper {
                width: 25vw;
                height: auto;
                box-sizing: border-box;
                border: 1px solid grey;
                display: flex;
                flex-direction: column;
            }

            #comment-profile-wrapper {
                width: 25vw;
                height: 42px;
            }

            #comment {
                width: 25vw;
                height: auto;
            }

            #menu {
                height: 90vh;
                width: 25vw;
                background-color: azure;
            }

            #profileSplitter {
                height: 22.5vh;
                width: 25vw;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            #createPostSplitter {
                height: 22.5vh;
                width: 25vw;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            #logoutSplitter {
                height: 22.5vh;
                width: 25vw;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            #settingSplitter {
                height: 22.5vh;
                width: 25vw;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .h1H:hover {
                display: inline-block;
                transform: scale(1.01);
            }

            .left {
                width: 25vw;
                background-color: white;
            }

            .middle {
                width: 60vw;
                background-color: white;
            }

            .profilePic {
                height: 5vh;
                width: 5vh;
                border-radius: 25px;
                margin-left: 10px;
                margin-top: 10px;
            }

            .img {
                height: auto;
                width: 35vw;
                display: flex;
                margin: auto;
            }

            .button {
                background-color: black;
                color: white;
                border: none;
                font-size: 35px;
                width: 200px;
                height: 50px;
                border-radius: 10px;
                cursor: pointer;
            }

            #comment-button {
                background-color: black;
                color: white;
                font-size: 15px;
                width: auto;
                height: auto;
                border-radius: 10px;
                padding: 10px;
                cursor: pointer;
            }

            #open-comment-box {
                cursor: pointer;
            }

            #make-comment-popup-bg {
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                position: absolute;
                background-color: rgba(0, 0, 0, 0.5);
                visibility: hidden;
                display: flex;
                justify-content: center;
                align-items: center;
                opacity: 1;
            }

            #make-comment-box {
                width: 35vw;
                height: 50vh;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                border-radius: 15px;
                background-color: white;
            }

            .txtBox {
                width: 20vw;
                height: 15vh;
                background-color: #c9c9c9;
            }

            #exit {
                width: 15px;
                height: 15px;
                position: absolute;
                top: 30vh;
                right: 35vw;
                cursor: pointer;
            }

            .comment-avatar {
                width: 25px;
                heightL: 25px;
                border-radius: 50%;
                margin-left: 1.5vh;
            }

            #profile-page-popup-bg {
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                position: absolute;
                background-color: rgba(0, 0, 0, 0.5);
                visibility: hidden;
                display: flex;
                justify-content: center;
                align-items: center;
                opacity: 1;
            }

            #profile-page-container {
                width: 50vw;
                height: 90vh;
                background-color: white;
                border-radius: 25px;
                position: relative;
                display: flex;
                align-items: center;
                flex-direction: column;
            }

            #exit_profile {
                width: 30px;
                height: 30px;
                position: absolute;
                top: 8px;
                right: 16px;
                cursor: pointer;
            }

            .profile-page-row {
                display: flex;
                flex-direction: row;
                display: flex;
                align-items: center;
                text-align: center;
                margin-top: 2vh;
            }

            .profile-page-row h2 {
                margin-left: 2vw;
                margin-right: 2vw;
            }

            .profile-page-titles {
                margin-left: 25px;
                margin-right: 10vw;
            }

            .profile-page-avatar {
                width: 150px;
                height: 150px;
                border-radius: 50%;
                margin-right: 1vw;
            }

            .profile-input-box {
                background-color: #c9c9c9;
                height: 30px;
                width: 200px;
            }
        }
    </style>

    <div id="head">
        <a href="feed" style="color: black; text-decoration: none">

            <h1 class="h1H" style="color: white; font-size: 80px;">FakeBook</h1>

        </a>
    </div>

</head>

<body>

    <div id="container">
        <div id="profile-page-popup-bg">
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

                        <input type="file" accept="image/*" name="new-avatar" id="file" placeholder="Choose new avatar">
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

        <div id="menu">

            <div id="settingSplitter">
                <a href="feed" style="text-decoration: none;">
                    <button class="button">Feed</button>
                </a>
            </div>

            <div id="profileSplitter" onclick="showProfile()">
                <button class="button">Profile</button>
            </div>

            <div id="createPostSplitter">
                <a href="/createPost" style="text-decoration: none;">
                    <button class="button">Create Post</button>
                </a>
            </div>

            <div id="logoutSplitter">
                <a href="logout"><button class="button">Log Out</button></a>
            </div>
        </div>
        <div id="feedContainer">
            @foreach ($user->posts()->get() as $post)
            <div id="sectionContainer">

                <div id="postContainer">

                    <div id="profileContainer">

                        <img src="{{$user->avatar}}" class="profilePic">

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

                    <div id="captionContainer">
                        {{$post->caption}}
                    </div>

                </div>

                <div id="commentContainer">
                    <h1>Comments</h1>
                    <div id="open-comment-box" onclick="showCommentBox('{{$post->id}}')">
                        <button id="comment-button">Make your comment</button>
                    </div>
                    @foreach ($post->comments()->get() as $comment)

                    <div id="commentWrapper">
                        <div id="comment-profile-wrapper">
                            <img class="comment-avatar" src="{{App\Models\Users::find($comment->users_id)->avatar}}">
                            {{App\Models\Users::find($comment->users_id)->user_name}}
                        </div>
                        <div id="comment">{{$comment->comment}}</div>
                    </div>

                    @endforeach

                </div>
                <div id="make-comment-popup-bg">
                    <div id="make-comment-box">
                        <div onclick="hideCommentBox()">
                            <img id="exit" src="pic/exit.png">
                        </div>
                        <h2>MAKE YOUR COMMENTS HERE!</h2>
                        <br><br><br>
                        <form action="process-comment.php" method="POST">

                            <input type="hidden" name="_token" value="{{csrf_token()}}">

                            <h3>Comment:</h3>

                            <input class="txtBox" type="text" name="comment" placeholder="Type your comment here">
                            <br><br>
                            <input type="hidden" id="posts_id" name="posts_id" value="">
                            <br>

                            <button id="comment-button">Post Comment</button>
                        </form>
                    </div>
                </div>

            </div>
            @endforeach
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