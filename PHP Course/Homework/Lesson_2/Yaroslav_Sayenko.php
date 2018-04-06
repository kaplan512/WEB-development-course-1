<?php
function reverseString($string)
{
    $regEx = '/\(([^()]+)\)/';
    do {
        $string = preg_replace_callback($regEx, function ($matches) {
            return strrev($matches[1]);
        }, $string, -1, $count);
    } while ($count > 0);
    return $string;
}

$string = "a(bcdefghijkl(mno)p)q";

echo reverseString($string);
?>