<?php


function isPalindrome($data){
    $counter = 0;
    $true = "this is palindrome";
    $false = "this is not palindrome";
    foreach (count_chars($data, 1) as $i => $val) {
        if ($val % 2 !== 0){
            $counter++;
        }
        if ($counter >= 2) {
            return $false;
        }
    }
    return $true;
}

$data = "abbcabb";

echo isPalindrome($data);
?>