<!DOCTYPE html>
<html>
<link rel="stylesheet" href="/stylesheet.css">

<head>

    <div id="head">
        <a href="/index" style="color: black; text-decoration: none">

            <h1 class="h1H" style="color: white; font-size: 80px;">FakeBook</h1>

        </a>
    </div>

</head>

<body id="body">

    <div id="container">

        <div id="upperContainer">

            <form action="process-post.php" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="_token" value="{{csrf_token()}}">

                <input type="file" accept="image/*" name="image" id="image">

                <br>

                <label>Title:</label>

                <br>

                <input type="text" id="title" name="post_title" placeholder="post title">

                <br>

                <label>Caption:</label>

                <br>

                <textArea type="text" id="captionBox" placeholder="Type your caption here"></textArea>

                <br>

                <button class="button">Post</button>

            </form>

        </div>

    </div>

</body>

</html>