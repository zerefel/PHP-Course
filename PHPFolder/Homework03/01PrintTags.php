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
    $tags = preg_split("/, /", $_GET["tags"]);

    //declaring the size of the array as a standalone variable is quicker than
    //writing down $i < sizeof($array) in the loop
    $arraySize = sizeof($tags);
    for($i = 0; $i < $arraySize; $i++) {
        echo "$i " . ": " . $tags[$i] . "<br>";
    }
}
?>
</body>
</html>
