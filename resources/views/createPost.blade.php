<!DOCTYPE html>
<html>
<link rel="stylesheet" href="/stylesheet.css">

<head>

    <div id="head">

        <h1 style="color: white; font-size: 80px;">FakeBook</h1>

    </div>

</head>

<body id="body">

    <div id="container">

        <div id="upperContainer">

            <form action="process-posts.php" method="POST">

                <input type="file" accept="image/*" name="image" id="file">

                <br><br>

                <input type="text" id="user_id" name="user_id" placeholder="user id">

                <br>

                <input type="text" id="post_title" name="post_title" placeholder="post title">

                <br>

                <input type="text" id="img_path" name="img_path" placeholder="img path">

                <br>

                <label>Caption:</label>

                <br>

                <textarea class="txtArea"></textarea>

                <br>

                <button class="button">Post</button>

            </form>

        </div>

    </div>

</body>

</html>