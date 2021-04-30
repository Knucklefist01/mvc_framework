<?php

$navLinks = [
    ["link" => ".", "label" => "Hem"],
    ["link" => "session", "label" => "Session"],
    ["link" => "throw", "label" => "Kasta Tärning"],
    ["link" => "dice", "label" => "Game 21"],
    ["link" => "yatzy", "label" => "Yatzy"],
    ["link" => "books", "label" => "Böcker"],
    ["link" => "highscores", "label" => "Highscores"],
]
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../resources/css/app.css">
    <title>Document</title>
</head>
<body>
<header>
    <div class="headerText">
        <h1>Välkommen till min sida!</h1>
        <h3>Byggd på ramverket Laravel</h3>
    </div>
    <nav>
    <?php foreach ($navLinks as $link) {?>
        <a href="<?=$link["link"]?>"><?= $link["label"]?></a>
    <?php } ?>
    </nav>
</header>
