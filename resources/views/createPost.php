<!DOCTYPE html>
<html>

<head>

    <style>
        * {
            margin: 0;
            padding: 0;
            border: 0;
            box-sizing: border-box;
        }

        #head {
            width: 100%;
            max-height: 10vh;
            text-align: center;
            background-color: black;
        }

        #body {
            width: 100%;
            min-height: 80vh;
            max-height: 90vh;
        }

        #container {
            min-height: 50vh;
            width: 50vw;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: lightgrey;
            margin-left: 25vw;
            margin-right: 25vw;
            margin-top: 15vh;
            margin-bottom: 25vh;
        }

        #upperContainer {
            min-height: 10vh;
            width: auto;
            border-color: black;
            border-style: dotted;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: 25%;
            margin-right: 25%;
        }

        .button {
            background-color: black;
            color: white;
            border: none;
            font-size: 25px;
            width: 100px;
            height: 30px;
            border-radius: 10px;
        }

        .txtArea {
            width: 100%;
            max-width: 100%;
            max-height: 100%;
            height: 200px;
        }
    </style>

    <div id="head">

        <h1 style="color: white; font-size: 80px;">FakeBook</h1>

    </div>

</head>

<body id="body">

    <div id="container">

        <div id="upperContainer">

            <form action="feed" method="get">

                <input type="file" accept="image/*" name="image" id="file">

                <br><br>

                <label>Caption:</label>

                <br>

                <textarea class="txtArea"></textarea>

                <br>

                <button class="button">Post</button>

            </form>

        </div>

    </div>

</body>

</html>