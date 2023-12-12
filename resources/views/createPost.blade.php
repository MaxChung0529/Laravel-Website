<!DOCTYPE html>
<html>
<link rel="stylesheet" href="/stylesheet.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<head>

    <div id="head">
        <a href="/feed" style="color: black; text-decoration: none">

            <h1 class="h1H" style="color: white; font-size: 80px;">FakeBook</h1>

        </a>
    </div>

</head>

<body id="body">

    <div id="container">

        <div id="upperContainer">

            <form action="{{ route('post.create') }}" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="_token" value="{{csrf_token()}}">

                <input type="file" accept="image/*" name="image" id="image">

                <br>

                <label>Title:</label>

                <br>

                <input type="text" id="post_title" name="post_title" placeholder="Post title">

                <br>

                <label>Caption:</label>

                <br>

                <textArea type="text" id="captionBox" name="captionBox" placeholder="Type your caption here"></textArea>

                <br>

                <button class="button" id="create-post-submit">Post</button>

            </form>

        </div>

    </div>

    <script>
        $("#create-post-submit").click(function () {
            var comment = $("#captionBox").val();
            var title = $("#post_title").val();

            if (comment == "" && title == "") {
                alert("What exactly do you want to do???")
                return false;
            } else if (comment == "") {
                alert("Caption cannot be empty!!!");
                return false;
            } else if (title == "") {
                alert("Title cannot be empty!!!")
                return false;
            }
        });
    </script>

</body>

</html>