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

    <title>Log In</title>

    <div id="head">

        <h1 style="color: white; font-size: 80px;">FakeBook</h1>

    </div>

</head>

<body>

    <div id="container">

        <form action="process-login.php" method="POST">

            <input type="hidden" name="_token" value="{{csrf_token()}}">

            <label for="email">Email:</label>

            <br>

            <input type="text" name="email" placeholder="Type your email here">

            <br>

            <label for="password">Password:</label>

            <br>

            <input type="text" name="password" placeholder="Type your password here">

            <br>

            <button>Login</button>

        </form>
        
    </div>

</body>

</html>