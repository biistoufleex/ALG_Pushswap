<?php

function sa()
{
    global $move, $la;
    if (count($la) >= 2) {
        $tmp = $la[0];
        $la[0] = $la[1];
        $la[1] = $tmp;
    }
    array_push($move, __FUNCTION__);
}

function sb()
{
    global $move, $lb;
    if (count($lb) >= 2) {
        $tmp = $lb[0];
        $lb[0] = $lb[1];
        $lb[1] = $tmp;
    }
    array_push($move, __FUNCTION__);
}

function sc()
{
    sa();
    sb();
    array_push($move, __FUNCTION__);
}

function pa()
{
    global $move, $la, $lb;
    if (!empty($lb)) {
        $element = array_shift($lb);
        array_unshift($la, $element);
    }
    array_push($move, __FUNCTION__);
}

function pb()
{
    global $move, $la, $lb;
    if (!empty($la)) {
        $element = array_shift($la);
        array_unshift($lb, $element);
    }
    array_push($move, __FUNCTION__);
}

function ra()
{
    global $move, $la;
    $element = array_shift($la);
    array_push($la, $element);
    array_push($move, __FUNCTION__);
}

function rb()
{
    global $move, $lb;
    $element = array_shift($lb);
    array_push($lb, $element);
    array_push($move, __FUNCTION__);
}

function rr()
{
    ra();
    rb();
    array_push($move, __FUNCTION__);
}

function rra()
{
    global $move, $la;
    $element = array_pop($la);
    array_unshift($la, $element);
    array_push($move, __FUNCTION__);
}

function rrb()
{
    global $move, $lb;
    $element = array_pop($lb);
    array_unshift($lb, $element);
    array_push($move, __FUNCTION__);
}

function rrr()
{
    rra();
    rrb();
    array_push($move, __FUNCTION__);
}