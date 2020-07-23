<?php

require_once "push_swap_function.php";

$la = [];
$lb = [];
$move = [];

// array de 100 pour test
// $la = range(1, 100);
// shuffle($la);

// recupere les valeurs et les met dans la 
function getList($argv) {
    global $la, $test;
    for ($i=1; $i < count($argv); $i++) { 
        array_push($la, $argv[$i]);
    }
}
getList($argv);


function swap()
{
    global $la, $lb, $move;
    if (empty($la)) {
        while (!empty($lb)) {
            pa();
        }
        return;
    } 
    $index = array_keys($la, min($la));
    while ($la[0] != min($la)) {
        if ($index[0] > count($la) / 2) {
            rra();
        } else {
            ra();
        }
    }
    pb();
    swap();
    
}
swap();
$result = implode(' ', $move);
echo trim($result);

// print_r($la);
// print_r($la);
// print_r($lb);
// echo count($move);
