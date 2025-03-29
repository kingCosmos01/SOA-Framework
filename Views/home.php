<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APPNAME; ?> - Home</title>


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

        .spinner {
            position: fixed;
            display: block;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: rgba(0, 31, 41, 0.96);
            justify-content: center;
            text-align: center;
            /* backdrop-filter: blur(20%); */
            z-index: 999;
        }

        .spinner .loader {
            position: absolute;
            display: block;
            top: 45%;
            left: 45%;
            transform: translate(-50%, -50%);
            font-size: 18px;
            color: #fff;
            background: transparent;
            padding: 20px;
            width: 100px;
            height: 100px;
            line-height: 100px;
            letter-spacing: 0.1em;
            border-radius: 50%;
            border: 8px solid #ffb300;
            animation: spin .8s backwards infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
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

        .hero {
            position: relative;
            display: flex;
            flex-direction: column;
            top: 47px;
            height: 90vh;
            background: #fff;
        }

        .hero .wrapper {
            position: relative;
            display: flex;
            flex-direction: column;
            height: inherit;
            margin: 10px;
            padding: 20px;
            justify-content: center;
            text-align: left;
            align-items: center;
        }

        .hero .wrapper .head {
            position: relative;
            display: flex;
            flex-direction: row;
            margin: 10px;
            width: 700px;
        }

        .hero .wrapper .head h2 {
            position: relative;
            display: inline-flex;
            flex-direction: row;
            padding: 20px;
            font-weight: 500;
            font-size: 35px;
        }

        .hero .wrapper .head h2>span.holder {
            position: relative;
            display: inline-block;
            margin-right: 5px;
            background: blueviolet;
            color: #fff;
            height: 40px;
            padding: 5px;
            border-radius: .2em;
            font-weight: bold;
        }

        .hero .wrapper ul.caption {
            position: relative;
            display: inline-flex;
            flex-direction: column;
            padding: 20px;
            font-weight: 400;
            /* background: blueviolet; */
            /* border-radius: .5em; */
            border-left: 5px solid blueviolet;
            border-right: 5px solid blueviolet;
        }

        .hero .wrapper ul.caption:hover {
            position: relative;
            display: inline-flex;
            flex-direction: column;
            border: 1px solid blueviolet;
            background: rgba(170, 0, 255, 0.3);
        }

        .hero .wrapper ul.caption:hover li {
            color: #000;
        }

        .hero .wrapper ul.caption li {
            list-style: none;
            font-size: 16px;
            font-weight: 500;
            margin: 10px;
            color: #000;
        }

        .hero .wrapper ul.caption li>button {
            position: relative;
            display: inline-block;
            outline: none;
            border: none;
            padding: 12px 28px;
            background: #fff;
            color: blueviolet;
            margin-top: 20px;
            border: 1px solid blueviolet;
            cursor: pointer;
        }

        .hero .wrapper ul.caption li>button:hover {
            border-radius: .5em;
        }

        .hero .wrapper ul.caption li:nth-child(1) {
            font-style: italic;
            font-weight: bold;
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

    <div class="hero">
        <div class="wrapper">
            <div class="head">
                <h2> <span class="holder" id="holder"> </span> Dummy {Data} to play around with for your API until you get confident</h2>
            </div>
            <ul class="caption">
                <li>json_decode($data)</li>
                <li>
                    <p>Take a moment to <kbd>Contribute Data</kbd> by writing a simple <kbd>article</kbd></p>
                    <button class="contribute" onclick="contribute()">Contribute</button>
                    <button class="contribute" onclick="seeDocs()">Read Documentation</button>
                </li>
            </ul>
        </div>
    </div>

    <div class="spinner" id="spinner">
        <span class="loader">Loading...</span>
    </div>

    <script>
        const holder = document.getElementById("holder");
        const spinner = document.getElementById("spinner");

        const availableMethod = ["GET", "POST", "UPDATE", "DELETE", "PUT", "PATCH"];
        const totalMethods = availableMethod.length;

        window.addEventListener('load', () => {
            spinner.style.display = "none";
        });

        nextMethod();

        function nextMethod() {

            let currentIndex = 0;
            holder.innerText = availableMethod[currentIndex];

            setInterval(() => {

                holder.innerText = availableMethod[currentIndex];
                ++currentIndex;

                if (currentIndex >= totalMethods) {
                    currentIndex = 0;
                }

                // console.log(currentIndex, totalMethods);

            }, 3000);

        }


        function contribute() {
            window.location.href = 'http://localhost/microservice/contribute';
        }

        function seeDocs() {
            window.location.href = 'http://localhost/microservice/api/v1/';
        }
    </script>
</body>

</html>