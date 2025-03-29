<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APPNAME; ?> - Contribute</title>


    <style>
        * {
            padding: 0;
            margin: 0;
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
            transition: all 500ms ease;
        }

        body {
            box-sizing: border-box;
            overflow: auto;
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
            background: #ffb300;
        }

        .navbar ul.right li>a {
            text-decoration: none;
            color: #fff;
            padding: 10px 20px;
        }


        /* container */
        .container {
            position: relative;
            display: flex;
            flex-direction: column;
            top: 47px;
            left: 0;
            height: 100vh;
            background: #eaeaea;
        }

        .container .wrapper {
            background: #fff;
            margin: 20px;
            border-radius: 20px;
        }

        .container .wrapper .head {
            padding: 15px;
            margin: 15px;
            text-align: center;
            border-bottom: 1px solid #ccc;
        }

        .container .wrapper .head h2 {
            text-transform: uppercase;
            font-weight: 500;
        }

        .container .wrapper .box {
            position: relative;
            display: flex;
            flex-direction: column;
        }

        .container .wrapper .box form {
            position: relative;
            display: flex;
            flex-direction: column;
            margin: 20px;
            border-radius: 10px;
        }

        .container .wrapper .box form .form-group {
            position: relative;
            display: flex;
            flex-direction: column;
            margin: 10px;
        }

        .container .wrapper .box form .form-group input,
        textarea {
            border: none;
            outline: none;
            padding: 10px;
            border-radius: .3em;
            border: 1px solid blueviolet;
            box-shadow: 0px 2px 3px 0px rgba(0, 0, 0, 0.2);
        }


        .container .wrapper .box form button {
            border: none;
            outline: none;
            padding: 15px;
            background: blueviolet;
            color: #fff;
            cursor: pointer;
            font-size: 18px;
        }
    </style>


</head>

<body>
    <div class="navbar">
        <div class="left">
            <h2>
                <a href="<?= MICROSERVICE; ?>"><?= APPNAME; ?></a>
            </h2>
        </div>

        <ul class="right">
            <li class="active"><a href="<?= MICROSERVICE; ?>">Home</a></li>
            <li><a href="<?= MICROSERVICE; ?>/posts">Contributions</a></li>
            <li><a href="<?= MICROSERVICE; ?>/news">News</a></li>
            <li><a href="<?= MICROSERVICE; ?>/api">Documentation</a></li>
        </ul>
    </div>
    <div class="container">
        <div class="wrapper">
            <div class="head">
                <h2>Contribute by Writing a Simple Article</h2>
            </div>
            <?php if (isset($data['error'])): ?>
                <div class="error"><?= $data['error']; ?></div>
            <?php endif; ?>
            <?php if (isset($data['message'])): ?>
                <div class="error"><?= $data['message']; ?></div>
            <?php endif; ?>
            <div class="box">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="title">Post Title</label>
                        <input type="text" name="title" id="title" placeholder="Enter Post Title..." required />
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label><br>
                        <textarea name="content" id="content" cols="50" rows="10" placeholder="write something..." required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="author">Sign Off</label>
                        <input type="text" id="author" name="author" placeholder="John Doe" />
                    </div>
                    <button type="submit" name="create_micropost">Publish</button>
                </form>
            </div>
        </div>


    </div>

</body>

</html>