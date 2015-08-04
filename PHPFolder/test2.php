<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>PrimesInRange</title>
    <style>

    </style>
</head>
<body>
<form action="">
    Starting Index:<input type="text" name="start"/>
    End:<input type="text" name="end"/>
    <input type="submit" value="Submit"/>
</form>
<br>
<?php
if (isset($_GET["start"]) && isset($_GET["end"])) {
    $start = $_GET["start"];
    $end = $_GET["end"];
    for( $j = $start; $j <= $end; $j++ ){
        for( $k = 2; $k < $j; $k++ ){
            if( $j % $k == 0 ){
                break;
            }
        }
        if( $k == $j ) {
            $primes = '<b>'.$j.', </b>';
            echo $primes;
        }else{
            echo $j.', ';
        }
    }
}

?>
</body>
</html>