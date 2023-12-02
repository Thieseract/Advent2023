<?php

$puzzleFile = fopen("day1data.txt", "r") or die("Unable to open file!");
$puzzleData = fread($puzzleFile, filesize("day1data.txt"));
$puzzleArray = explode(PHP_EOL, $puzzleData);

function checkCharacterForDigit($char) {

  $digits = [
    1, 2, 3, 4, 5, 6, 7, 8, 9, 0
  ];

  if (in_array($char, $digits)) {
    return true;
  } else {
    return false;
  }
}

function checkTextForDigit($text, $start) {

  $digits = [
    'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'
  ];

  foreach ($digits as $digit) {

    $trimmedText = substr($text, $start, strlen($digit));
    if (in_array($trimmedText, $digits)) {
      return $trimmedText;
    }
  }
}

function checkTextForDigitEnd($text, $start) {

  $digits = [
    'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'
  ];

  foreach ($digits as $digit) {

    $trimmedText = substr($text, $start - strlen($digit), strlen($digit));
    if (in_array($trimmedText, $digits)) {
      return $trimmedText;
    }
  }
}


function findFirstdigit($line) {

  for ($i = 0; $i < strlen($line); $i++) {

    $digitValues = [
      'one' => 1, 'two' => 2, 'three' => 3, 'four' => 4, 'five' => 5, 'six' => 6, 'seven' => 7, 'eight' => 8, 'nine' => 9
    ];

    $char = substr($line, $i, 1);

    if (checkCharacterForDigit($char)) {
      return intval($char);
    }

    $textDigit = checkTextForDigit($line, $i);
    if ($textDigit) {
      return $digitValues[$textDigit];
    }
  }
}

function findLastDigit($line) {

  for ($i = strlen($line); $i >= 0; $i--) {

    $digitValues = [
      'one' => 1, 'two' => 2, 'three' => 3, 'four' => 4, 'five' => 5, 'six' => 6, 'seven' => 7, 'eight' => 8, 'nine' => 9
    ];

    $char = substr($line, $i, 1);
    if (checkCharacterForDigit($char)) {
      return intval($char);
    }
    $textDigit = checkTextForDigitEnd($line, $i);
    if ($textDigit) {
      return $digitValues[$textDigit];
    }
  }
}

function main($puzzleArray) {
  $total = 0;

  foreach ($puzzleArray as $line) {
    $value = findFirstdigit($line) . findLastDigit($line);
    echo $value;
    echo PHP_EOL;

    $total += intval($value);
  }
  echo $total;
}

main($puzzleArray);
