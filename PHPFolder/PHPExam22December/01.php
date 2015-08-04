<?php
$childName = $_GET['childName'];
$wantedPresent = $_GET['wantedPresent'];
$riddles = explode(";", $_GET['riddles']);
$childName = str_replace(' ', '-', $childName);
$nameLength = strlen($childName);
$counter = 0;
for($i = 1; $i < $nameLength; $i++) {
    if ($counter == sizeof($riddles) - 1) {
        $counter = 0;
    }
    else {
        $counter++;
    }
}
$riddle = $riddles[$counter];
$childGift = '$giftOf' . htmlspecialchars(($childName));
$childGift .= ' = $[wasChildGood] ? \'' . htmlspecialchars($wantedPresent) . '\' : \'' . htmlspecialchars($riddle) . '\';';
echo $childGift;