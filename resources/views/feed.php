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

            #container {
                width: 100vh;
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

    <div id="head">
        <h1 style="color: white; font-size: 80px;">FakeBook</h1>
    </div>

</head>

<body>

    <div id="container">

        <div class="left">

            <div class="center">


            </div>
        </div>

        <div class="middle">

        </div>


    </div>
</body>
</html>
