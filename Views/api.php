<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APPNAME; ?> - Documentation</title>

    <style>
        * {
            padding: 0;
            margin: 0;
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
            transition: all 500ms ease;
        }

        body {
            box-sizing: border-box;
        }

        .navbar {
            position: fixed;
            display: flex;
            flex-direction: row;
            width: 100%;
            padding: 10px;
            align-items: center;
            justify-content: space-between;
            background: rgb(1, 34, 46);
        }

        .navbar .left {
            position: relative;
            display: flex;
            flex-direction: row;
            left: 120px;
        }

        .navbar .left h2 {
            font-weight: 500;
        }

        .navbar .left h2>a {
            text-decoration: none;
            color: #fff;
        }

        .navbar .left h2>a:hover {
            color: rgb(54, 199, 31);
        }

        .navbar ul.right {
            position: relative;
            display: flex;
            flex-direction: row;
            right: 120px;
        }

        .navbar ul.right li {
            position: relative;
            display: inline-block;
            list-style: none;
            margin-right: 10px;
        }

        .navbar ul.right li.active a {
            background: rgb(255, 179, 0);
        }

        .navbar ul.right li>a {
            text-decoration: none;
            color: #fff;
            padding: 10px 20px;
        }

        .container {
            position: relative;
            display: flex;
            flex-direction: row;
            width: 100%;
            background: rgba(1, 34, 46, 0.84);
            z-index: -1;
        }

        .container .wrapper {
            width: 100%;
            padding: 20px;
            margin: 20px;
        }

        .container .wrapper .head {
            position: relative;
            display: flex;
            flex-direction: column;
            padding: 10px;
            border-bottom: 1px solid white;
        }

        .container .wrapper .head h2 {
            color: #fff;
            margin: 15px;
        }

        .container .wrapper .head i {
            position: relative;
            display: inline-block;
            width: 150px;
            margin: 10px 20px;
            background: #ccc;
            padding: 3px;
            letter-spacing: 0.1em;
            border-radius: .1em;
            font-size: 13px;
            text-align: center;
        }

        .container .wrapper .hero {
            position: relative;
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
            margin-top: 30px;
        }

        .container .wrapper .hero .left {
            flex: 1;
            padding: 10px;
            background: #ffffff;
            border-radius: .9em;
            box-shadow: 0px 2px 3px 2px rgba(0, 0, 0, 0.2);
        }

        .container .wrapper .hero .left h2 {
            font-weight: 500;
            margin: 10px;
            font-size: 18px;
        }

        .container .wrapper .hero .left h2.app {
            margin-top: 10px;
        }

        .container .wrapper .hero .left ul {
            position: relative;
            display: flex;
            flex-direction: column;
            padding: 5px;
        }

        .container .wrapper .hero .left ul.api {
            padding: 10px;
            background: #ed9c06;
            border-radius: .9em;
        }

        .container .wrapper .hero .left ul:hover {
            transform: scale(101%);
        }

        .container .wrapper .hero .left ul.app {
            padding: 10px;
            background: #ed9c06;
            border-radius: .9em;
        }

        .container .wrapper .hero .left ul li {
            list-style-type: none;
            margin: 5px;
            font-weight: normal;
        }

        .container .wrapper .hero .left ul li ul.allowed {
            position: relative;
            display: flex;
            flex-direction: row;
            width: 100%;
        }

        .container .wrapper .hero .left ul li ul.allowed li {
            padding: 8px 5px;
            margin-right: 5px;
            border-radius: .5em;
            font-size: 10px;
            background: #00ff84;
            color: rgb(0, 38, 20);
        }

        .container .wrapper .hero .left ul li ul.allowed li:nth-child(2) {
            background: #ff004c;
            color: rgb(54, 1, 17);
        }

        .container .wrapper .hero .left ul li ul.allowed li:nth-child(3) {
            background: #6f00ff;
            color: rgb(24, 1, 53);
        }

        /* .container .wrapper .hero .left ul li ul.allowed li:nth-child(4) {
            background: #3cff00;
            color:#0b2e00;
        } */

        .container .wrapper .hero .left ul li>span {
            font-weight: 500;
            color: #011e2b;
        }

        .container .wrapper .hero .left ul li>kbd {
            background: #eaeaea;
            padding: 3px;
            letter-spacing: 0.1em;
            border-radius: .5em;
            font-size: 11px;
        }

        .container .wrapper .hero .center {
            flex: 1;
        }

        .container .wrapper .hero .right {
            flex: 1;
        }
    </style>

</head>

<body>


    <!-- Navbar -->
    <div class="navbar">
        <div class="left">
            <h2>
                <a href="<?= MICROSERVICE; ?>"><?= APPNAME; ?></a>
            </h2>
        </div>
        <ul class="right">
            <li><a href="<?= MICROSERVICE; ?>">Home</a></li>
            <li><a href="<?= MICROSERVICE; ?>/posts">Contributions</a></li>
            <li><a href="<?= MICROSERVICE; ?>/news">News</a></li>
            <li class="active"><a href="<?= MICROSERVICE; ?>/api">Documentation</a></li>
        </ul>
    </div>

    <div class="container">
        <div class="wrapper">
            <div class="head">
                <h2><?= APPNAME; ?> - Documentation </h2>
                <i>API Version: <b><?= APPVERSION; ?></b></i>
                <i>Author: <?= AUTHOR; ?> </i>
            </div>

            <div class="hero">
                <div class="left">
                    <h2>API Routes</h2>
                    <ul class="api">
                        <li>
                            <span>Documentation: </span>
                            <kbd>http://localhost/microservice/api/</kbd>
                        </li>
                        <li>
                            <span>API Version: </span>
                            <kbd>http://localhost/microservice/api/v1/</kbd>
                        </li>
                        <li>
                            <span>All Posts: </span>
                            <kbd>http://localhost/microservice/api/v1/posts/</kbd>
                        </li>
                    </ul>

                    <h2 class="app">APP Routes</h2>
                    <ul class="app">
                        <li>
                            <span>All Posts: </span>
                            <kbd>http://localhost/microservice/</kbd>
                        </li>
                        <li>
                            <span>All Posts: </span>
                            <kbd>http://localhost/microservice/posts/</kbd>
                        </li>
                        <li>
                            <span>Make Contribution: </span>
                            <kbd>http://localhost/microservice/contribute/</kbd>
                        </li>
                        <li>
                            <span>Single Post: </span>
                            <kbd>http://localhost/microservice/posts/{post-id}</kbd>
                        </li>
                    </ul>


                    <h2 class="app">Allowed HTTP Requests</h2>
                    <ul class="app">
                        <li>
                            <span>All Posts: </span>
                            <kbd>http://localhost/microservice/</kbd>
                            <ul class="allowed">
                                <li>GET</li>
                            </ul>
                        </li>
                        <li>
                            <span>All Posts: </span>
                            <kbd>http://localhost/microservice/posts/</kbd>
                            <ul class="allowed">
                                <li>GET</li>
                            </ul>
                        </li>
                        <li>
                            <span>Single Post: </span>
                            <kbd>http://localhost/microservice/posts/{post-id}</kbd>
                            <ul class="allowed">
                                <li>GET</li>
                                <li>UPDATE</li>
                                <li>DELETE</li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="center">

                </div>
                <div class="right">Right</div>
            </div>
        </div>
    </div>

</body>

</html>