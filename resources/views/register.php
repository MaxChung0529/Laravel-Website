<!DOCTYPE html>
<html>

<style>

    #container {
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: white;
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

<body style="background-color: black;">

    <div id="container">
        <form action="processregister.php" method="post">

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