<?php
/*
 * A heap has a complete binary tree structure.
 *
 * Heapify the elements by starting from the sub-trees till the root element.
 * Therefore, the first index of a non-leaf node will be given by `n/2 - 1` where n is the total elements in an array
 * Remember that leaf nodes don't need to be heapified
 *
 * To sort the array, swap the root element with the last element in the array,
 * reduce the size of the heap by 1 and repeat the process until
 * everything is sorted
 */
function heapSort($array) {
    $length = count($array);
    // Construct the max heap
    for ($index = ($length / 2) - 1; $index >= 0; $index--) {
        $array = heapifyMax($array, $index, $length);
    }

    // Sort the array
    for ($i = $length - 1; $i >= 0; $i--) {
        $array = swap($array, 0, $i);
        $array = heapifyMax($array, 0, $i);
    }

    return $array;
}

/*
 * heapifyMax function creates a max heap using recursion
 *
 * It takes the first element as the root, then searches for the largest element
 * in the array. If the largest element is greater than the root, it swaps the
 * root element and the largest element
 *
 * If the index of an element in an array is `i`, it's left child will be given by `2i + 1` and right child by `2i + 2`.
 * Also, its parent will be given by the lower bound of `(i - 1)/2`
 */
function heapifyMax($array, $element_index, $array_length) {
    $largest_index = $element_index;
    $left_child = (2 * $element_index) + 1;
    $right_child = (2 * $element_index) + 2;

    // if left child is larger than the root index
    if (($left_child < $array_length) && ($array[$left_child] > $array[$largest_index])) {
        $largest_index = $left_child;
    }

    // if right child is larger than the index of the current largest value
    if (($right_child < $array_length) && ($array[$right_child] > $array[$largest_index])) {
        $largest_index = $right_child;
    }

    // if the largest value is not the root
    if ($largest_index !== $element_index) {
        $array = swap($array, $element_index, $largest_index);
        $array = heapifyMax($array, $largest_index, $array_length);
    }

    return $array;
}

function swap($array, $left, $right) {
    $temporary = $array[$left];
    $array[$left] = $array[$right];
    $array[$right] = $temporary;

    return $array;
}

$test = [14, 33, 27, 10, 35, 19, 42, 44];
echo 'Original Array : ' . implode(',', $test) . "\n";

$sorted = heapSort($test);
echo 'Sorted Array : ' . implode(',', $sorted) . "\n";

echo '>>>>>>>>>>>>>>' ."\n";

$test_array = [100, 56, 34, 21, 67, 0, 6, 54, 56, 34];
echo 'Original : ' . implode(',', $test_array) . "\n";

$sorted_array = heapSort($test_array);
echo 'Sorted Array : ' . implode(',', $sorted_array) . "\n";
