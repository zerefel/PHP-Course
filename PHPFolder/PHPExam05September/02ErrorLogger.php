<?php

preg_match_all("/Exception in thread \".*\" java.*\\.(.*):.*\n.*?\\.(.*?)\\((.*?):(\\d+)/", $_GET['errorLog'], $matches);
$output = "<ul>";
for($i = 0; $i < sizeof($matches[0]); $i++) {
    $output .= "<li>line <strong>" . $matches[4][$i]. "</strong> - <strong>" . htmlspecialchars($matches[1][$i]) ."</strong> in <em>" . htmlspecialchars($matches[3][$i]) .":" . htmlspecialchars($matches[2][$i]) ."</em></li>";
}
$output .= "</ul>";
echo $output;