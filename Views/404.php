<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404</title>

    <style>
        * {
            padding: 0;
            margin: 0;
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
            transition: all 500ms ease;
        }

        body {
            box-sizing: border-box;
            background: #011b2e;
        }

        .wrapper {
            position: absolute;
            display: block;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            text-align: center;
        }

        .wrapper h2 {
            font-weight: 500;
            font-size: 45px;
            color: #fff;
        }

        .wrapper h2>span {
            font-size: 45px;
            color: red;
            font-weight: bold;
        }

        .wrapper a {
            position: relative;
            display: inline-flex;
            color: white;
            margin-top: 10px;
            font-size: 18px;
        }

        .wrapper a:hover {
            color: green;
        }
    </style>

</head>

<body>
    <div class="wrapper">
        <h2> <span>404</span> - Page Not Found!</h2>
        <a href="<?= MICROSERVICE; ?>/">Go Back to Safety</a>
    </div>
</body>

</html>