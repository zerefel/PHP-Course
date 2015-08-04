<?php
date_default_timezone_set('UTC');
if(isset($_GET['currentDate']) && isset($_GET['messages'])) {
    $currentDate = strtotime($_GET['currentDate']);
    $messageLine = preg_split("/\\r?\\n/", $_GET['messages']);
    $messageArray = [];

    for ($i = 0; $i < sizeof($messageLine); $i++) {
        $messageArray[$i] = explode("/ ", $messageLine[$i]);
        preg_replace("/[ ]/", "", $messageArray[$i][1]);
    }

    for ($i = 0; $i < sizeof($messageArray); $i++) {
        $messageArray[$i][0] = trim($messageArray[$i][0]);
        $messageArray[$i][1] = strtotime($messageArray[$i][1]);
    }

    function dateSort($a, $b)
    {
        $a = $a[1];
        $b = $b[1];
        if ($a == $b) {
            return 0;
        }
        return ($a > $b) ? 1 : -1;
    }

    usort($messageArray, 'dateSort');

    $lastLog = $messageArray[sizeof($messageArray) - 1][1];
    $lastLogDate = $currentDate - $lastLog;
    $timeStamp;

    if (date('z', $lastLog) < date('z', $currentDate) && floor($lastLogDate / (60 * 60)) < 24) {
        $timeStamp = "yesterday";
    }
    else {
        if ($lastLogDate < 60) {
            $timeStamp = 'a few moments ago';
        }
        else if (floor($lastLogDate / (60)) < 60) {
            $time = floor($lastLogDate / (60));
            $timeStamp = "$time minute(s) ago";
        }
        else if (floor($lastLogDate / (60 * 60)) < 24) {
            $time = floor($lastLogDate / (60 * 60));
            $timeStamp = "$time hour(s) ago";
        }
        else if (floor($lastLogDate / (60 * 60)) > 24 ) {
            $timeStamp = date('d-m-Y', $lastLog);
        }
    }

    $output = '';
    for ($i = 0; $i < sizeof($messageArray); $i++) {
        $output .= "<div>" . htmlspecialchars($messageArray[$i][0]) . "</div>\n";
    }
    $output .= "<p>Last active: <time>$timeStamp</time></p>";
    echo $output;
}