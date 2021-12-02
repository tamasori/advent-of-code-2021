<?php

$data = file('data.txt');
$depth = 0;
$horizontal = 0;
foreach ($data as $movement){
    $movement = trim($movement);
    $parts = explode(' ', $movement);
    $command = $parts[0];
    $distance = (int)$parts[1];
    if ($command == 'forward'){
        $horizontal += $distance;
    } elseif ($command == 'down'){
        $depth += $distance;
    } elseif ($command == 'up'){
        $depth -= $distance;
    }
}

echo $horizontal * $depth;