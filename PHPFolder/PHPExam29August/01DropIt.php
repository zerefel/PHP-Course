<?php
if(isset($_GET['text']) && isset($_GET['minFontSize']) && isset($_GET['maxFontSize']) && isset($_GET['step'])) {
    $text = $_GET['text'];
    $minFontSize = (int)$_GET['minFontSize'];
    $maxFontSize = (int)$_GET['maxFontSize'];
    $fontSize = $minFontSize;
    $step = (int)$_GET['step'];
    $style = "style='";
    $output= '';
    $isIncreasing = true;

    for($i = 0; $i < strlen($text); $i++) {

        $style .= "font-size:$fontSize;";

        if(ord($text[$i]) % 2 == 0) {
            $style .= "text-decoration:line-through;";
        }

        $output .= "<span $style'>" . htmlspecialchars($text[$i]) . "</span>";

        if(isLetter($text[$i])) {
            if($fontSize >= $maxFontSize) {
                $isIncreasing = false;
            }
            if($fontSize <= $minFontSize) {
                $isIncreasing = true;
            }
        }

        if(isLetter($text[$i]) && $isIncreasing) {
            $fontSize += $step;
        }
        else if(isLetter($text[$i]) && !$isIncreasing) {
            $fontSize -= $step;
        }


        $style = "style='";
    }
    echo $output;
}

function isLetter($char) {
    return (ord($char) >= ord('a') && ord($char) <= ord('z')) ||
    ((ord($char) >= ord('A') && ord($char) <= ord('Z')));
}