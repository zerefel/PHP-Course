<!DOCTYPE html>
<html>
<head>
    <title>Print Tags</title>
</head>
<body>
<h1>Enter tags:</h1>
<form method="get">
    <input type="text" name="tags">
    <input type="submit">
</form>
<?php
if(isset($_GET["tags"])) {

    $tagsArray = preg_split("/, /", $_GET["tags"]);
    $count = array_count_values($tagsArray);

    var_dump($count);

    foreach($count as $tag=>$occurrences) {
        echo $tag . " -> " . $occurrences . "<br>";
    }
}
?>
</body>
</html>
