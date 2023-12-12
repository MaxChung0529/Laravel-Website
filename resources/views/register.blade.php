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

        <a href="/index" style="color: black; text-decoration: none">

            <h1 class="h1H" style="color: white; font-size: 80px;">FakeBook</h1>

        </a>

    </div>

</head>

<body>

    <div id="container">

        <form action="{{ route('user.register') }}" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="_token" value="{{csrf_token()}}">

            <label for="avatar">Avatar picture</label>

            <br>

            <input type="file" accept="image/*" name="avatar" id="file">

            <br>

            <label for="email">Email:</label>

            <br>
            @if ($errors->has('password'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
            <br>

            <input type="text" id="email" name="email" placeholder="Type your email here">

            <br>

            <label for="user_name">Username:</label>

            <br>
            @if ($errors->has('user_name'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('user_name') }}</strong>
            </span>
            @endif
            <br>

            <input type="text" id="user_name" name="user_name" placeholder="Type your username here">

            <br>

            <label for="password">Password:</label>

            <br>
            @if ($errors->has('password'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
            <br>

            <input type="text" id="password" name="password" placeholder="Type your password here">

            <br>

            <button>Register</button>

        </form>

    </div>

</body>

</html>