<!DOCTYPE html>
<html>

<head>

    <style>
        * {
            margin: 0;
            padding: 0;
            border: 0;
            box-sizing: border-box;

            #head {
                width: 100%;
                min-height: 6vh;
                text-align: center;
                background-color: black;
            }

            #body {
                width: 100%;
                min-height: 80vh;
                max-height: 90vh;
                display: flex;
                align-items: center;
                justify-content: center;
                background-color: yellow;
            }

            #container {
                height: 90vh;
                width: 50vw;
                margin-left: 25vw;
                display: flex;
                align-items: center;
                flex-direction: column;
                background-color: grey;
            }

            #profileContainer {
                width: 50vw;
                height: 7vh;
                background-color: chartreuse;
            }

            #picContainer {
                height: 56vh;
                width: 24vw;
                align-items: center;
                justify-content: center;
                background-color: red;
                margin-top: 3vh;
            }

            #captionContainer {
                width: 40vw;
                height: 20vh;
                background-color: aqua;
            }

            #commentContainer {
                height: 90vh;
                width: 25vw;
                background-color: blueviolet;
            }

            .left {
                width: 20vw;
                background-color: white;
            }

            .middle {
                width: 60vw;
                background-color: white;
            }

            .profilePic {
                height: 5vh;
                width: 5vh;
                border-radius: 25px;
                margin-left: 10px;
                margin-top: 10px;
            }

            .img {
                height: 56vh;
                max-width: 24vw;
                width: auto;
                display: flex;
                margin: auto;
            }

            .center {
                display: block;
                margin-left: auto;
                margin-right: auto;
                width: 10vw;
                text-align: center;
                max-width: 12vw;
            }

            .splitter {
                width: 20vw;
                height: 25%;
                background: grey;
            }
        }
    </style>

    <div id="head">
        <h1 style="color: white; font-size: 80px;">FakeBook</h1>
    </div>

</head>

<body>

    <div id="container">

        <div id="profileContainer">
            <img src="https://i.ytimg.com/vi/UCwLisILOhA/maxresdefault.jpg" class="profilePic" alt="miles">

            JakeDaDawg
        </div>

        <div id="picContainer">
            <img src="https://www.w3schools.com/images/w3schools_green.jpg" class="img">
        </div>

        <div id="captionContainer">
            Hello
        </div>

    </div>

</body>

</html>