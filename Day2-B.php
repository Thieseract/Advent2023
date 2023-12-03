<?php

$puzzleFile = fopen("day2data.txt", "r") or die("Unable to open file!");
$puzzleData = fread($puzzleFile, filesize("day2data.txt"));
$puzzleArray = explode(PHP_EOL, $puzzleData);

$total = 0;


foreach($puzzleArray as $line){

    $gameInfo = explode(' ',strtok($line, ':'));
    $gameID = $gameInfo[1];

    $games = explode(';', trim(strtok('')));

    $mins = [
        'blue' => 0,
        'red' => 0,
        'green' => 0
    ];

    foreach($games as $game){
        $turns = explode(',', $game);

        foreach($turns as $turn){
            $turnStats = explode(' ', trim($turn));

            $turnColor = $turnStats[1];
            $turnValue = $turnStats[0];

            if($turnValue > $mins[$turnColor]){
                $mins[$turnColor] = $turnValue;
            }
        }
    }

    $total += $mins['red'] * $mins['blue'] * $mins['green'];
}

echo $total;