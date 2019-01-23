<?php
function mergeSort($array) {
    $array_length = count($array);
    if ($array_length <= 1) {
      return $array;
    }

    $start_index = 0;
    $middle_index = $array_length / 2;

    $left = array_slice($array, $start_index, $middle_index);
    $right = array_slice($array, $middle_index);

    $left = mergeSort($left);
    $right = mergeSort($right);

    return merge($left, $right);
}

function merge($left_array, $right_array) {
    $result = [];
    $first_index = 0;
    $next_index = 1;

    while (count($left_array) > 0 && count($right_array) > 0) {
        if ($left_array[$first_index] < $right_array[$first_index]) {
            $result[] = $left_array[$first_index];
            $left_array = array_slice($left_array, $next_index);
        } else {
            $result[] = $right_array[$first_index];
            $right_array = array_slice($right_array, $next_index);
        }
    }

    // left array remnants
    while(count($left_array) > 0) {
        $result[] = $left_array[$first_index];
        $left_array = array_slice($left_array, $next_index);
    }

    // right array remnants
    while(count($right_array) > 0) {
        $result[] = $right_array[$first_index];
        $right_array = array_slice($right_array, $next_index);
    }

    return $result;
}


$array_to_sort = [2, 5, 1, 3, 7, 2, 3, 8, 6, 3];
$sort = mergeSort($array_to_sort);

echo 'Original array => ';
print_r($array_to_sort);

echo 'Sorted Array: => ';
print_r($sort);

$test = [14, 33, 29, 10, 45, 67, 3, 42, 19];
echo "Original Array : " . implode(',' , $test) . "\n";

$sorted_array = mergeSort($test);
echo 'Sorted Array : ' . implode(',' , $sorted_array) . "\n";
