<?php

$puzzleFile = fopen("day2data.txt", "r") or die("Unable to open file!");
$puzzleData = fread($puzzleFile, filesize("day2data.txt"));
$puzzleArray = explode(PHP_EOL, $puzzleData);

$total = 0;
$limits = [
    'blue' => 14,
    'red' => 12,
    'green' => 13
];

foreach($puzzleArray as $line){

    echo $line;

    $gameInfo = explode(' ',strtok($line, ':'));
    $gameID = $gameInfo[1];

    $games = explode(';', trim(strtok('')));

    $possible = true;
    $possibleGames = [];

    foreach($games as $game){
        $turns = explode(',', $game);

        foreach($turns as $turn){
            $turnStats = explode(' ', trim($turn));
            
            $turnColor = $turnStats[1];
            $turnValue = $turnStats[0];

            if($turnValue > $limits[$turnColor]){
                $possible = false;
            }
        }
    }

    if($possible){
        echo ' __ ' . $gameID . ' is possible' . PHP_EOL;
        $total += intval($gameID);
    } else {
        echo PHP_EOL;
    }
}

echo $total;