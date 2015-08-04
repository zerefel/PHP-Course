<?php
$table = json_decode($_GET['jsonTable']);
$columns = $table[0];
$replies = '';

foreach($table[1] as $reply) {
    $replies .= $reply;
}
preg_match_all("/time=(\\d+)ms/", $replies, $replies);
$word = '';
$message = [];
for($i = 0; $i < sizeof($replies[0]); $i++) {
    $time = (int)$replies[1][$i];
    if(ctype_alpha(chr($time)) || ctype_space(chr($time))) {
        $word .= chr($time);
    }
    else if(ctype_space($time)) {
        $word .= ' ';
    }
   if($time == 42) {
        $word .= chr($time);
        array_push($message, $word);
        $word = '';
    }
    if($i == sizeof($replies[0]) - 1) {
        array_push($message, $word);
    }
}

$output = '';
$output .= "<table border='1' cellpadding='5'>";
$numberOfWords = sizeof($message);


for($i = 0; $i < $numberOfWords; $i++) {

    $counter = 1;

    $cellPosition = 0;

    $output .= "<tr>";
    for($j = 0; $j < strlen($message[$i]); $j++) {
        $cellPosition++;
        $letter = $message[$i][$j];

        //CHECK if char is a letter, and assign a cell to it
        if(ctype_alpha($letter)) {
            $cell = "<td style='background:#CAF'>" . htmlspecialchars($letter) . "</td>";
        }
        else {
            $cell = "<td></td>";
        }
        $output .= $cell;

        if($letter == '*' || strlen($message[$i]) - 1 == $j) {
           while($cellPosition < $columns) {
               $output .= "<td></td>";
               $cellPosition++;
           }
        }

        //check message length and counter value, if length is > than columns and counter is greater too, add row
        if(strlen($message[$i]) > $columns && $counter == $columns && $j != strlen($message[$i]) - 1) {
            $output .= "</tr><tr>";
            $counter = 0;
            $cellPosition = 0;
        }
        $counter++;
    }
    $output .= "</tr>";
}
$output .= "</table>";

echo $output;

