<!DOCTYPE html>
<html>

<style>
    * {
        margin: 0;
        padding: 0;
        border: 0;
        box-sizing: border-box;
    }

    h1 {
        font-size: 200px;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }

    #container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        display: flex;
    }

    #lowerContainer {
        padding-left: 100px;
    }

    .button {
        background-color: black;
        color: white;
        border: none;
        font-size: 35px;
        width: 200px;
        height: 50px;
        border-radius: 10px;
    }

    .button:hover {
        background-color: grey;
    }


</style>

<div id="container">

    <h1>FakeBook</h1>

    <div id="lowerContainer">

        <form action="login" method="get">

            <button class="button">Login</button>

        </form>

        <br>

        <form action="register" method="get">

            <button class="button">Register</button>

        </form>

    </div>
</div>

</html>