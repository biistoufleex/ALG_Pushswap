<?php

require_once "push_swap_function.php";

$la = [];
$lb = [];
$move = [];

// $la = range(1, 100);
// shuffle($la);

function getList($argv) {
    global $la, $test;
    for ($i=1; $i < count($argv); $i++) { 
        array_push($la, $argv[$i]);
    }
}

function swap()
{
    global $la, $lb, $move, $minAction, $maxAction;
    if (empty($la)) {
        $indexMinLb = array_keys($lb, min($lb));

        while ($lb[0] != max($lb)) {
            ($indexMinLb[0] > count($lb) / 2) ? rrb() : rb();
        }
        while (!empty($lb)) {
            pa();
        }
        return;
    }
    $indexMax = array_keys($la, max($la));
    $indexMin = array_keys($la, min($la));
    $invertMax = abs($indexMax[0]-count($la));
    $invertMin = abs($indexMin[0]-count($la));
    $closer = min($indexMin[0], $indexMax[0], abs($indexMin[0]-count($la)), abs($indexMax[0]-count($la)));

    switch ($closer) {
        case $indexMin[0]:
            for ($i=0; $i < $indexMin[0]; $i++) { 
                ra();
            }
            pb();
            break;
        
        case $indexMax[0]:
            for ($j=0; $j < $indexMax[0]; $j++) { 
                ra();
            }
            pb();
            rb();
        break;
        
        case $invertMin:
            for ($k = 0 ; $k < $invertMin; $k++) { 
                rra();
            }
            pb();
            break;
    
        case $invertMax:
            for ($l = 0 ; $l < $invertMax; $l++) { 
                rra();
            }
            pb();
            rb();
            break;
    }
    swap();
}

getList($argv);
swap();

$result = implode(' ', $move);
echo trim($result);
// print_r($la);
// print_r($lb);
// echo count($move);