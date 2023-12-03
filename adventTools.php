<?php

function loadPuzzzDataAsArray($day){

    $puzzleMainFile = fopen("day". $day . "data.txt", "r") or die("Unable to open file!");
    $puzzleMainData = fread($puzzleMainFile, filesize("day". $day . "data.txt"));
    $puzzleArray = explode(PHP_EOL, $puzzleMainData);

    $puzzleTestFile = fopen("day". $day . "testdata.txt", "r") or die("Unable to open file!");
    $puzzleTestData = fread($puzzleTestFile, filesize("day". $day . "testdata.txt"));
    $puzzleTestArray = explode(PHP_EOL, $puzzleTestData);

    return [$puzzleArray, $puzzleTestArray];

}