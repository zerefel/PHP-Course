<?php
$text = $_GET['text'];
$lineLength = $_GET['lineLength'];

$matrix = [];
$matrixRows = ceil(strlen($text) / $lineLength);

for($i = 0; $i < $matrixRows; $i++) {
    $matrix[$i] = [];
}
for($i = 0; $i < $matrixRows; $i++) {
    for($j = 0; $j < $lineLength; $j++) {
        $matrix[$i][$j] = ' ';
    }
}

$colCounter = 0;
$rowCounter = 0;

for($i = 0; $i < strlen($text); $i++) {
    $matrix[$rowCounter][$colCounter] = $text[$i];
    $colCounter++;
    if($colCounter == $lineLength) {
     $colCounter = 0;
     $rowCounter++;
    }

}

for($i = count($matrix) - 1; $i > 0; $i--) {
    for($j = 0; $j < count($matrix[$i]); $j++) {
        if($matrix[$i][$j] == ' ') {
            $matrix[$i][$j] = $matrix[$i - 1][$j];
            $matrix[$i - 1][$j] = ' ';
        }
    }
}

for($i = count($matrix) - 1; $i > 0; $i--) {
    for($j = 0; $j < count($matrix[$i]); $j++) {
        if($matrix[$i][$j] == ' ') {
            $matrix[$i][$j] = $matrix[$i - 1][$j];
            $matrix[$i - 1][$j] = ' ';
        }
    }
}

echo "<table>";

for($i = 0; $i < count($matrix); $i++) {
    echo "<tr>";
    for($j = 0; $j < count($matrix[0]); $j++) {
        echo "<td>" . htmlspecialchars($matrix[$i][$j]) . "</td>";
    }
    echo "</tr>";
}
echo "<table>";

