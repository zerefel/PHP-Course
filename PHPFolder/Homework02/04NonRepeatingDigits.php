<?php
$input = 247;
$maxNumber = 0;

if($input > 999) {
    $maxNumber = 999;
}
else if($input < 100) {
    echo 'no';
    return;
}
else {
    $maxNumber = $input;
}

for($i = 102; $i <= $maxNumber; $i++) {
    $strNum = (string)$i;
    if($strNum[0] != $strNum[1] && $strNum[0] != $strNum[2] && $strNum[1] != $strNum[2]) {
        echo $i . "\n";
    }
    else {
        continue;
    }
}
?>