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
        font-size: 180px;
        height: 250px;
        width: auto;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }

    #container {
        min-height: 100vh;
        align-items: center;
        justify-content: center;
        display: flex;
    }

    #upperContainer {
        font-size: 180px;
        padding: 10px;
        height: 250px;
        width: auto;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }

    #rightContainer {
        height: 250px;
        width: 300px;
        display: flex;
        flex-direction: column;
        display: flex;
        align-items: center;
        justify-content: center;ol b                                  0
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

    <div id="upperContainer">

        <h1>FakeBook</h1>

    </div>

    <div id="rightContainer">

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