<?php
function insertionSort($array) {
    $total = count($array);
    //assuming item at index 0 to be sorted as it does not have anything to it's left
    for ($index = 1; $index < $total; $index++) {
        $element = $array[$index];

        // locate the correct position to insert the element
        $position = $index;
        while ($position > 0 && $array[$position - 1] > $element) {
            $array[$position] = $array[$position - 1];
            $position--;
        }

        // insert the element
        $array[$position] = $element;
    }

    return $array;
}

$test = [14, 33, 27, 10, 35, 19, 42, 44];
echo 'Original Array : ' . implode(',', $test) . "\n";

$sorted = insertionSort($test);
echo 'Sorted Array : ' . implode(',', $sorted) . "\n";
