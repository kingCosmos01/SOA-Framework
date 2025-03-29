<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Microposts</title>
    <link rel="stylesheet" href="<?= PUBLICROOT; ?>/css/main.css">

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
            z-index: 999;
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
            top: 50px;
            background: #eaeaea;
        }

        .container .wrapper {
            width: 100%;
            display: flex;
            flex-direction: column;
            margin: 20px;
        }

        .container .wrapper h2 {
            font-weight: 500;
            margin: 5px;
        }

        .container .wrapper .card {
            margin: 10px;
            padding: 15px;
            width: 70%;
            background: #fff;
            border-radius: .3em;
            margin-bottom: 10px;
        }

        .container .wrapper .card ul.extra {
            position: relative;
            display: flex;
            flex-direction: row;
            margin: 8px;
            width: 40%;
            justify-content: space-around;
        }

        .container .wrapper .card ul.extra li {
            list-style: none;
            padding: 5px;
            border-radius: .8em;
            background: rgba(1, 27, 46, 0.63);
            color: #fff;
            font-size: 14px;
            font-style: italic;
        }

        .cta-button {
            position: fixed;
            display: block;
            bottom: 50px;
            right: 70px;
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: #13b729;
            cursor: pointer;
            text-align: center;
            overflow: hidden;
        }

        .cta-button:hover {
            transform: scale(90%);
        }

        .cta-button span {
            position: relative;
            display: block;
            width: 40%;
            height: 3px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #fff;
        }

        .cta-button span:nth-child(1) {
            transform: rotate(90deg);
            left: 21px;
        }
    </style> <!-- inline styles  -->

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
            <li class="active"><a href="<?= MICROSERVICE; ?>/posts">Contributions</a></li>
            <li><a href="<?= MICROSERVICE; ?>/news">News</a></li>
            <li><a href="<?= MICROSERVICE; ?>/api">Documentation</a></li>
        </ul>
    </div>



    <div class="container">
        <div class="wrapper">
            <h2>Recent Contributions</h2>
            <hr>
            <?php foreach ($data as $key => $post): ?>
                <div class="card">
                    <div class="title">
                        <h2><a href="<?= POSTS; ?>/<?= $post['post_id']; ?>"><?= $post['title']; ?></a></h2>
                        <p><?= $post['description']; ?></p>
                        <ul class="extra">
                            <li>Author: <?= $post['author']; ?></li>
                            <li>Date: <?= $post['date_created']; ?></li>
                        </ul>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="cta-button" id="guvi">
        <span></span>
        <span></span>
    </div>


    <script>
        const guvi = document.getElementById("guvi");

        guvi.addEventListener('click', () => {
            window.location.href = 'http://localhost/microservice/contribute';
        });
    </script>

</body>

</html>