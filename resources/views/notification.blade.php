<!DOCTYPE html>
<html>
<link rel="stylesheet" href="/feedStyle.css">

<head>
    <div id="head">
        <a href="/feed" style="color: black; text-decoration: none">

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

        <div id="notficationContainer">
            @foreach ($notifications as $notification)

            <div class="notification-wrapper">
                <img class="notificationIcon" src="{{App\Models\Users::find($notification->from_id)->avatar}}">

                <a href="{{ route('user.view', ['id' => App\Models\Users::find($notification->from_id)->id]) }}"
                    class="notificationProfile">
                    <div class="notificationName">{{App\Models\Users::find($notification->from_id)->user_name}}</div>
                </a>

                @if ($notification->comments_id != '')
                    <p>commented on your post</p>
                @else
                    <p>liked your post</p>
                @endif


                <p class="notificationPostTitle">
                    &#60;&#60;{{App\Models\Posts::find(App\Models\Comments::find($notification->comments_id)->posts_id)->post_title}}&#62;&#62;
                </p>


                @if (App\Models\Posts::find(App\Models\Comments::find($notification->comments_id)->posts_id)->image != '')
                <img class="miniThumbnail"
                    src="{{App\Models\Posts::find(App\Models\Comments::find($notification->comments_id)->posts_id)->image}}">
                @endif
            </div>

            @endforeach
        </div>

    </div>

    <script>


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