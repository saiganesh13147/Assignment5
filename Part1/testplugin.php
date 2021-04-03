<?php
/*
Plugin Name: testplugin

*/

function fccount($content)
{

    return $content . "  Total Words  " . str_word_count(strip_tags($content));

}

add_filter('the_content', 'fccount');

function replacestring($string)
{

    $vowels = array(
        "a",
        "e",
        "i",
        "o",
        "u",
        "A",
        "E",
        "I",
        "O",
        "U"
    );
    $replace = array(
        "*",
        "&",
        "^",
        "%",
        "$",
        "*",
        "&",
        "^",
        "%",
        "$"
    );

    $string = str_replace($vowels, $replace, $string);

    return $string;

}

add_filter('pre_comment_content', 'replacestring');

?>
