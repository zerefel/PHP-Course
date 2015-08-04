<?php

$text = $_GET['text'];
$word = '';
$newWord = '';
$output = "<p>";

for($i = 0; $i < strlen($text); $i++) {
    if(ctype_alpha($text[$i])){
        $word .= $text[$i];
    }
    else {
        $newWord = processWord($word);
        $output .=  htmlspecialchars($newWord) . htmlspecialchars($text[$i]);
        $word = '';
    }
    if($i == strlen($text) - 1) {
        $newWord = processWord($word);
        $output .=  htmlspecialchars($newWord);
    }
}

$output .= "</p>";

echo $output;

function processWord($word) {
    if(ctype_upper($word)) {
        if(strrev($word) == $word) {
            return doubleLetters($word);
        }
        else {
            return strrev($word);
        }
    }
    else {
        return $word;
    }
}

function doubleLetters($word) {
    $newWord = '';
    for($i = 0; $i < strlen($word); $i++) {
        $newWord .= $word[$i] . $word[$i];
    }
    return $newWord;
}