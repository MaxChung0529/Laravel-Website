<!DOCTYPE html>
<html>

<head>
    <title>FakeBook</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            border: 0;
            box-sizing: border-box;

            #head {
                width: 100%;
                min-height: 6vh;
                background-color: aqua;
            }

            #container {
                min-height: 100vh;
                display: flex;
            }

            .left {
                width: 20vw;
                background-color: white;
            }

            .middle {
                width: 60vw;
                background-color: white;
            }

            .img {
                border-radius: 50%;
                object-fit: contain;
                width: 200px;
                height: 200px;
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

</head>

<body>

    <div id="head">
        <h1>FakeBook</h1>
    </div>

    <div id="container">

        <div class="left">

            <div class="center">


            </div>
        </div>

        <div class="middle">

            <input type="file" accept="image/*" name="image" id="file">

            <br>

            <form action="feed" method="get">

                <button>Create Post</button>

            </form>

        </div>


    </div>
</body>

</html>