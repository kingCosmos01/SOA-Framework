<?php

// var_dump($data);

foreach ($data as $key => $news) {
    echo "<h2>" . $news['title'] . "</h2>" . "</br>";
    echo "<p>" . $news['description'] . "</p>" . "</br>";
    echo "<span>" . $news['author'] . "</span>" . "</br>";
}
