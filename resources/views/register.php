<!DOCTYPE html>
<html>

<style>
    #container {
        height: 100vh;
        align-items: center;
        justify-content: center;
        display: flex;
        background-color: white;
    }

    body {
        margin: 0;
        padding: 10;
        height: 100%;
        max-height: 100%;
        background: black;
        float: left;
        width: 100%;
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

    button:hover {}
</style>

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

            <button>Register</button>

    </div>

</body>

</html>