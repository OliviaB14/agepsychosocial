<?php
/**
 * Created by PhpStorm.
 * User: olivia
 * Date: 01/11/2018
 * Time: 12:41
 */

function myTruncate($string, $limit, $break=".", $pad="...")
{
    // return with no change if string is shorter than $limit
    if(strlen($string) <= $limit) return $string;

    // is $break present between $limit and the end of the string?
    if(false !== ($breakpoint = strpos($string, $break, $limit))) {
        if($breakpoint < strlen($string) - 1) {
            $string = substr($string, 0, $breakpoint) . $pad;
        }
    }

    return $string;
}

?>