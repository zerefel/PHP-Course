
<?php
date_default_timezone_set('UTC');
$numbersString = $_GET['numbersString'];
preg_match_all("/[^a-zA-Z 0-9](\\d+)[^a-zA-Z 0-9]/", $numbersString, $numbersArray);
$datesString = $_GET['dateString'];
preg_match_all("/(19|20)\\d\\d[\\-\\/.](0[1-9]|1[012])[\\-\\/.](0[1-9]|[12][0-9]|3[01])/", $datesString, $datesArray);

$days = 0;

if(sizeof($numbersString[1]) > 0) {
    foreach($numbersArray[1] as $number) {
        $days += (int)$number;
    }
}
else {
    echo "<p>No dates</p>";
}

$days = (int)strrev($days);
$validDates = false;

foreach($datesArray[0] as $date) {
    if(validateDate($date)) {
        $validDates = true;
        echo "<ul>";
        foreach($datesArray[0] as $date) {
            if(validateDate($date)) {
                $date = date('Y-m-d', strtotime("+" . $days . " days", strtotime($date)));
                echo "<li>$date</li>";
            }
        }
        echo "</ul>";
        break;
    }
}
if(!$validDates) {
    echo "<p>No dates</p>";
}

function validateDate($date, $format = 'Y-m-d') {
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}