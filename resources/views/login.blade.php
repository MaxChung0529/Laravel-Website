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

        <a href="/index" style="color: black; text-decoration: none">

            <h1 class="h1H" style="color: white; font-size: 80px;">FakeBook</h1>

        </a>

    </div>

</head>

<body>

    <div id="container">

        <form action="{{ route('user.login') }}" method="POST">

            <input type="hidden" name="_token" value="{{csrf_token()}}">

            <label for="email">Email:</label>

            <br>
            @if ($errors->has('email'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
            <br>

            <input type="text" id="email" name="email" placeholder="Type your email here">

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

            <button>Login</button>

        </form>

        <div id="buttonRow">
            <a href="/register"><button>Register</button></a>
        </div>

    </div>
    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if (exist) {
            alert(msg);
        }
    </script>

</body>

</html>