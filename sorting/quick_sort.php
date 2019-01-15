<?php
function quickSort($array) {
    if (count($array) <= 1) {
      return $array;
    }

    $first_index = 0;
    $pivot = $array[$first_index]; // take the first element as pivot
    $left = $right = [];
    for($index = $first_index + 1; $index < count($array); $index++) {
        if($array[$index] <= $pivot){
            $left[] = $array[$index];
        }
        else {
            $right[] = $array[$index];
        }
    }
    $left = quickSort($left);
    $right = quickSort($right);
    return array_merge($left, array($pivot), $right);
}

$test = [36, 33, 2, 89, 6, 27, 34, 45, 7, 15, 20, 2];
echo 'Original Array : ' . implode(',', $test) . "\n";

$sorted = quickSort($test);
echo 'Sorted Array : ' . implode(',', $sorted) . "\n";
