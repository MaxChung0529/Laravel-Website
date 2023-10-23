<!DOCTYPE html>
<html>

<head>
    <style>
        #container {
            min-height: 80vh;
            max-height: 90vh;
            display: flex;
            align-items: center;
            justify-content: center;
            display: flex;
            background-color: blue;
        }

        #head {
            width: 100vw;
            max-height: 10vh;
            text-align: center;
            background-color: black;
        }

        #body {
            width: 100vw;
            min-height: 80vh;
            max-height: 90vh;
            background-color: brown;
        }

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