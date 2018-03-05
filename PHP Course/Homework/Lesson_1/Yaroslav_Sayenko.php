<?php

function stepsCount($arr){
    $count = 0;
    for ($i = 0; $i < count($arr)-1; $i++){
        if ($arr[$i] >= $arr[$i+1]) {
            $count += ($arr[$i] - $arr[$i+1] + 1);
            $arr[$i + 1] += ($arr[$i] - $arr[$i + 1] + 1);
        }
    }
    return $count;

}

$array = [-1000, 0, -2, 0];
echo(stepsCount($array));
?>
