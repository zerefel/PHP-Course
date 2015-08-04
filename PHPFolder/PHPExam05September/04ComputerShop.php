<?php

$list = $_GET['list'];
$maxPrice = $_GET['maxPrice'];
$minPrice = $_GET['minPrice'];
$filter = $_GET['filter'];
$order = $_GET['order'];
$configs = preg_split("/\r?\n/", $list, -1, PREG_SPLIT_NO_EMPTY);
$desktops = [];
$laptops = [];
$computers = [];
$id = 1;

foreach($configs as $config) {
    $splittedConfig = preg_split("/(\\s[|]\\s)/", $config, -1, PREG_SPLIT_NO_EMPTY);
    $splittedConfig[0] = trim($splittedConfig[0]);
    array_push($splittedConfig, $id);
    $splittedConfig[3] = (float)$splittedConfig[3];
    if($splittedConfig[1] == 'laptop') {
        array_push($laptops, $splittedConfig);
    }
    else {
        array_push($desktops, $splittedConfig);
    }
    array_push($computers, $splittedConfig);
    $id++;
}

echo $maxPrice;


uasort($laptops, function($a, $b) {
    global $order;
    if($order == 'ascending') {
        if($a[3] == $b[3]) {
            return ($a[4] < $b[4]) ? -1 : 1;
        }
       return ($a[3] < $b[3]) ? -1 : 1;
    }
    else if($order == 'descending') {
        if($a[3] == $b[3]) {
            return ($a[4] < $b[4]) ? -1 : 1;
        }
        return ($a[3] < $b[3]) ? 1 : - 1;
    }
});
uasort($desktops, function($a, $b) {
    global $order;
    if($order == 'ascending') {
        if($a[3] == $b[3]) {
            return ($a[4] < $b[4]) ? -1 : 1;
        }
        return ($a[3] < $b[3]) ? -1 : 1;
    }
    else if($order == 'descending') {
        if($a[3] == $b[3]) {
            return ($a[4] < $b[4]) ? -1 : 1;
        }
        return ($a[3] < $b[3]) ? 1 : - 1;
    }
});
uasort($computers, function($a, $b) {
    global $order;
    if($order == 'ascending') {
        if($a[3] == $b[3]) {
            return ($a[4] < $b[4]) ? -1 : 1;
        }
        return ($a[3] < $b[3]) ? -1 : 1;
    }
    else if($order == 'descending') {
        if($a[3] == $b[3]) {
            return ($a[4] < $b[4]) ? -1 : 1;
        }
        return ($a[3] < $b[3]) ? 1 : - 1;
    }
});


if($filter == 'laptop') {
    foreach($laptops as $laptop) {
        if($laptop[3] >= (float)$minPrice && (float)$laptop[3] <= $maxPrice) {
            $components = explode(", ", $laptop[2]);
            $cpu = $components[0];
            $ram = $components[1];
            $gpu = $components[2];
            echo "<div class=\"product\" id=\"product" . $laptop[4] ."\">";
            echo "<h2>" . htmlspecialchars($laptop[0]) ."</h2>";
            echo "<ul><li class=\"component\">" . htmlspecialchars($cpu) ."</li>";
            echo "<li class=\"component\">" . htmlspecialchars($ram) ."</li>";
            echo "<li class=\"component\">" . htmlspecialchars($gpu) ."</li>";
            echo "</ul><span class=\"price\">" . number_format($laptop[3], 2, '.', '') . "</span></div>";
        }
    }
}

if($filter == 'desktop') {
    foreach($desktops as $desktop) {
        if($desktop[3] >= $minPrice && $desktop[3] <= $maxPrice) {
            $components = explode(", ", $desktop[2]);
            $cpu = $components[0];
            $ram = $components[1];
            $gpu = $components[2];
            echo "<div class=\"product\" id=\"product" . $desktop[4] ."\">";
            echo "<h2>" . htmlspecialchars($desktop[0]) ."</h2>";
            echo "<ul><li class=\"component\">" . htmlspecialchars($cpu) ."</li>";
            echo "<li class=\"component\">" . htmlspecialchars($ram) ."</li>";
            echo "<li class=\"component\">" . htmlspecialchars($gpu) ."</li>";
            echo "</ul><span class=\"price\">" . number_format($desktop[3], 2, '.', '') . "</span></div>";

        }
    }
}

if($filter == 'all') {
    foreach($computers as $computer) {
        var_dump($computer);
        if($computer[3] >= $minPrice && $computer[3] <= $maxPrice) {
            $components = explode(", ", $computer[2]);
            $cpu = $components[0];
            $ram = $components[1];
            $gpu = $components[2];
            echo "<div class=\"product\" id=\"product" . $computer[4] ."\">";
            echo "<h2>" . htmlspecialchars($computer[0]) ."</h2>";
            echo "<ul><li class=\"component\">" . htmlspecialchars($cpu) ."</li>";
            echo "<li class=\"component\">" . htmlspecialchars($ram) ."</li>";
            echo "<li class=\"component\">" . htmlspecialchars($gpu) ."</li>";
            echo "</ul><span class=\"price\">" . number_format($computer[3], 2, '.', '') . "</span></div>";

        }
    }
}
