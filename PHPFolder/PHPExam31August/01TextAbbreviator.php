<?php
$textArray =  preg_split("/\\r?\\n/", $_GET['list'], -1, PREG_SPLIT_NO_EMPTY);
$maxSymbols = $_GET['maxSize'];

$listOutput = '<ul>';

for($i = 0; $i < count($textArray); $i++) {
    $line = trim($textArray[$i]);
    $lineLength = strlen($line);
    $newLine = '';
    if($lineLength >= $maxSymbols) {
        for($j = 0; $j < $maxSymbols; $j++) {
            $newLine .= $line[$j];
        }
        $listOutput .= "<li>" . htmlspecialchars($newLine) . "...</li>";
    }
    else {
        $listOutput .= "<li>" . htmlspecialchars($line) . "</li>";
    }
}
$listOutput .= "</ul>";

echo $listOutput;