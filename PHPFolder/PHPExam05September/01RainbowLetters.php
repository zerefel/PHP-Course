<?php
$text = $_GET['text'];
$red = (int)$_GET['red'];
$green = (int)$_GET['green'];
$blue = (int)$_GET['blue'];
$nth = (int)($_GET['nth']);

$redHex = str_pad(dechex($red), 2, '0', STR_PAD_LEFT);
$greenHex = str_pad(dechex($green), 2, '0', STR_PAD_LEFT);
$blueHex = str_pad(dechex($blue), 2, '0', STR_PAD_LEFT);

$color = "$redHex" . "$greenHex" . "$blueHex";

$output = '<p>';
for($i = 0; $i < strlen($text); $i++) {
    $char = htmlspecialchars($text[$i]);
    if(($i + 1) % $nth == 0) {
        $output .= "<span style=\"color: #$color\">$char</span>";
    }
    else {
        $output .= $char;
    }
}
$output .= "</p>";

echo $output;