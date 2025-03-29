<style>
    body {
        overflow: hidden;
    }

    .single-post-container {
        position: fixed;
        display: flex;
        flex-direction: column;
        top: 47px;
        height: 100vh;
        background: #ccc;
        z-index: 999;
    }

    .single-post-container .wrapper {
        padding: 20px;
        margin: 20px;
        border-radius: .5em;
        background: #fff;
    }

    .single-post-container .wrapper .head {
        position: relative;
        display: flex;
        flex-direction: column;
        border-bottom: 1px solid #ccc;
    }

    .single-post-container .wrapper .head .top {
        position: relative;
        display: flex;
        flex-direction: row;
        align-items: center;
    }

    .single-post-container .wrapper .head .top .backbtn {
        flex: 1;
        padding: 3px;
    }

    .single-post-container .wrapper .head .top .backbtn>a {
        text-decoration: none;
        background: #000;
        font-weight: bold;
        color: #fff;
        padding: 5px;
        border-radius: .8em;
    }

    .single-post-container .wrapper .head .top h2 {
        flex: 5;
        font-weight: 500;
    }


    .single-post-container .wrapper .head .low {
        position: relative;
        display: flex;
        flex-direction: row;
        margin: 10px;
    }

    .single-post-container .wrapper .head .low p {
        position: relative;
        display: inline-flex;
        padding: 5px;
        left: 150px;
        margin-left: 20px;
        font-style: italic;
        /* background: #eaeaea; */
        letter-spacing: 0.1em;
        font-size: 13px;
        font-weight: bold;
    }

    .single-post-container .wrapper .head .low p::after {
        content: "|";
        margin-left: 20px;
    }

    .single-post-container .wrapper .head .low p:nth-child(2)::after {
        content: " ";
        margin-left: 20px;
    }

    .single-post-container .wrapper .post-body {
        margin: 20px;
        padding: 10px;
        text-align: left;
    }

    .single-post-container .wrapper .post-body p {
        line-height: 2;
    }
</style>

<div class="single-post-container">
    <div class="wrapper">
        <div class="head">
            <div class="top">
                <div class="backbtn"><a href="<?= MICROSERVICE; ?>/posts">&LeftArrow; Back</a></div>
                <h2><?= $data['title']; ?></h2>
            </div>
            <div class="low">
                <p class="author">Author: <?= $data['author']; ?></p>
                <p class="date-created">Date: <?= $data['date_created']; ?></p>
            </div>
        </div>

        <div class="post-body">
            <p>
                <?= $data['description']; ?>
            </p>
        </div>
    </div>

</div>