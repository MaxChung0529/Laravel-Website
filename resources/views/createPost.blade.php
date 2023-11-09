<!DOCTYPE html> <html> <link rel="stylesheet" href="/stylesheet.css"> <head> <div id="head"> <h1 style="color: white;
    font-size: 80px;">FakeBook</h1>

</div>

</head>

<body id="body">

    <div id="container">

        <div id="upperContainer">

            <form action="process-post.php" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="_token" value="{{csrf_token()}}">

                <input type="file" accept="image/*" name="image" id="file">

                <br>

                <input type="text" id="post_title" name="post_title" placeholder="post title">

                <br>

                <label>Caption:</label>

                <br>

                <input type="text" name="caption" placeholder="Type your caption here">

                <br>

                <button class="button">Post</button>

            </form>

        </div>

    </div>

</body>

</html>