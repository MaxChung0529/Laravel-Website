<!DOCTYPE html>
<html>
<link rel="stylesheet" href="/stylesheet.css">

<head>
    <style>

        label {
            text-align: left;
            font-size: 35px;
            width: 100px
        }

        input {
            width: 500px;
            height: 50px;
        }

        button {
            width: 100px;
            font-size: 20px;
            margin-top: 10px;
        }
    </style>

    <div id="head">

        <h1 style="color: white; font-size: 80px;">FakeBook</h1>

    </div>
</head>

<body>

    <div id="container">
        <form action="processlogin.php" method="post">

            <label for="UserName">Username:</label>
            <br>
            <input type="text" id="UserName" name="UserName">

            <br>

            <label for="UserPassword">User Password:</label>
            <br>
            <input type="text" id="UserPw" name="UserPw">
            <br>

            <button>Login</button>

    </div>

</body>

</html>