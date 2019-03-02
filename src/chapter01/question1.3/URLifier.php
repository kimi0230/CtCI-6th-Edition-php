<?php

class URLifier
{
    public static function urlify_org(&$str)
    {
        // start at the end and swallow all spaces
        $length = strlen($str);
        for ($i = $length - 1; $i >= 0; $i--) {
            if ($str[$i] !== ' ') {
                break;
            }
        }
        // fill in string in reverse order
        // begining with the first non-space
        // character from the right
        $j = $length - 1;
        while ($i >= 0) {
            if ($str[$i] === ' ') {
                $str[$j--] = '0';
                $str[$j--] = '2';
                $str[$j--] = '%';
            } else {
                $str[$j--] = $str[$i];
            }
            $i--;
        }
    }

    public static function urlify(&$str)
    {
        // print_r(trim($str));
        $spaceCount = 0;
        $length = strlen(trim($str));

        // calculate space times, figure out extra char
        for ($i = 0; $i < $length; $i++) {
            if ($str[$i] == ' ') {
                $spaceCount++;
            }
        }
        $index = $length + $spaceCount * 2;

        // fill in string in reverse order
        for ($i = $length - 1; $i > 0; $i--) {
            if ($str[$i] === ' ') {
                $str[--$index] = '0';
                $str[--$index] = '2';
                $str[--$index] = '%';
            } else {
                $str[--$index] = $str[$i];
            }

        }
    }
}

// my test
// $test_str = "Mr John Smith    ";
// URLifier::urlify($test_str);
// print_r($test_str);
