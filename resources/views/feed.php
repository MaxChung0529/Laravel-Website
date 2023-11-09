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
                height: 10vh;
                text-align: center;
                background-color: black;
            }

            #body {
                width: 100%;
                height: 90vh;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            #container {
                height: 90%;
                width: 100vw;
                display: flex;
                flex-direction: row;
            }

            #postContainer {
                height: 90vh;
                width: 50vw;
                display: flex;
                align-items: center;
                flex-direction: column;
                background-color: whitesmoke;
            }

            #profileContainer {
                width: 50vw;
                height: 7vh;
                flex-direction: row;
                display: flex;
                background-color: chartreuse;
            }

            #userNameContainer {
                margin-left: 10px;
                height: 7vh;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            #name {
                font-size: medium;
                font-family: Arial, Helvetica, sans-serif;
            }

            #name:hover {
                display: inline-block;
                transform: scale(1.1);
            }

            #picContainer {
                height: 63vh;
                width: 35vw;
                align-items: center;
                justify-content: center;
                background-color: red;
            }

            #captionContainer {
                width: 40vw;
                height: 20vh;
                background-color: aqua;
            }

            #commentContainer {
                height: 90vh;
                width: 25vw;
                text-align: center;
                background-color: white;
                box-sizing: border-box;
                border: 1px solid grey;
            }

            #comment {
                width: 25vw;
                height: auto;
                box-sizing: border-box;
                border: 1px solid grey;
            }

            #menu {
                height: 90vh;
                width: 25vw;
                background-color: azure;
            }

            #profileSplitter {
                height: 22.5vh;
                width: 25vw;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            #createPostSplitter {
                height: 22.5vh;
                width: 25vw;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            #searchSplitter {
                height: 22.5vh;
                width: 25vw;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            #settingSplitter {
                height: 22.5vh;
                width: 25vw;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .h1H:hover {
                display: inline-block;
                transform: scale(1.01);
            }

            .left {
                width: 25vw;
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

            .button {
                background-color: black;
                color: white;
                border: none;
                font-size: 35px;
                width: 200px;
                height: 50px;
                border-radius: 10px;
            }
        }
    </style>

    <div id="head">
        <a href="feed.php" style="color: black; text-decoration: none">

            <h1 class="h1H" style="color: white; font-size: 80px;">FakeBook</h1>

        </a>
    </div>

</head>

<body>

    <div id="container">

        <div id="menu">
            <div id="profileSplitter">
                <a href="" style="text-decoration: none;">
                    <button class="button">Profile</button>
                </a>
            </div>

            <div id="createPostSplitter">
                <a href="/createPost" style="text-decoration: none;">
                    <button class="button">Create Post</button>
                </a>
            </div>

            <div id="searchSplitter">
                <a href="logout"><button class="button">Log Out</button>
            </div>

            <div id="settingSplitter">
                <a href="" style="text-decoration: none;">
                    <button class="button">Setting</button>
                </a>
            </div>
        </div>

        <div id="postContainer">

            <div id="profileContainer">

                <img src="https://i.ytimg.com/vi/UCwLisILOhA/maxresdefault.jpg" class="profilePic" alt="miles">

                <div id="userNameContainer">

                    <a href="user profile" id="name" style="color: black; text-decoration: none"><b>JakeDaDawg</b></a>

                </div>

            </div>

            <div id="picContainer">
                <img src="https://www.w3schools.com/images/w3schools_green.jpg" class="img">
            </div>

            <div id="captionContainer">
                Hello
            </div>

        </div>

        <div id="commentContainer">
            <div>
                <h1>Comments</h1>
            </div>

        </div>

    </div>

</body>

</html>