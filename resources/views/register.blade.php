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

    <title>Account Register</title>

    <div id="head">

        <h1 style="color: white; font-size: 80px;">FakeBook</h1>

    </div>

</head>

<body>

    <div id="container">

        <form action="process-register.php" method="POST">

            <input type="hidden" name="_token" value="{{csrf_token()}}">

            <label for="user_name">User Name:</label>

            <br>

            <input type="text" id="user_name" name="user_name" placeholder="Type your username here">

            <br>

            <label for="user_password">Password:</label>

            <br>

            <input type="text" id="user_password" name="user_password" placeholder="Type your password here">

            <br>

            <button>Register</button>

        </form>

    </div>

</body>

</html>