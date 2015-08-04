<?php

$html = $_GET['html'];

$openingTagPattern = "/<div\\s*?.*(?=(id|class)\\s*?=\\s*?\"(header|nav|main|article|section|aside|footer)\").*/";
preg_match_all($openingTagPattern, $html, $openingTags);

var_dump($openingTags);

foreach($openingTags[0] as $key=>$value) {
    //echo htmlspecialchars($value);
    echo "<br>";
    $attribute = $openingTags[1][$key] . '=\"' . $openingTags[2][$key] . "\"";
    $semanticHTML = str_replace('div', $openingTags[2][0], $value);
    $semanticHTML = str_replace($attribute, '', $semanticHTML);
    echo "<br>";
    echo htmlentities($semanticHTML);
}
