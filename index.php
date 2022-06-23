<?php

runTask();

/**
 * Init task
 */
function runTask()
{
    
    for ($x = 1; $x <= 100; $x++) {
        $multiples = getMultiplesAsString($x);
        echo "$x: $multiples \n";
    }
}



/**
 * Get multiples of the given number and return as string.
 * This function will call other functions internally to
 * check and format
 * @param $number
 * @return string
 */
function getMultiplesAsString($number)
{
    $multiples = getMultiples($number);
    return formatString($multiples);
}

/**
 * For the number passed in, count up to that number itself (for loop).
 * Check if that number can be divided and DOES NOT have a remainder,
 * if yes, then push it to an array ($multiples).
 * @param $number
 * @return array
 */
function getMultiples($number)
{
    $multiples = [];
    for ($x = 1; $x <= $number; $x++) {
        if (!($number % $x)) {
            array_push($multiples, $x);
        }
    }
    return $multiples;
}

/**
 * Pass in an array, if the array length is less <= 2, then return a PRIME string.
 * If it has more elements, append each to a string and add opening and closing brackets.
 * @param $multiples
 * @return string
 */
function formatString($multiples)
{
    $count = count($multiples);
    
    if($count <= 2) {
        return "[PRIME]";
    }

    if($count > 2) {
                $string = "";
        foreach ($multiples as $multiple) {
            $string .= "$multiple, ";
        }
        return appendBrackets($string);
    }
}

/**
 * Trim last comma in the string and add opening and closing brackets
 * @param $string
 * @return string
 */
function appendBrackets($string)
{
    $string = substr($string, 0, -2);
    return "($string)";
}