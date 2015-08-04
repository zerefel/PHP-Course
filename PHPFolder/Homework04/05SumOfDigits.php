<!DOCTYPE html>
<html>
<head>
    <title>Sum Of Digits</title>
</head>
<body>
<form method="post">
    <label for="input">Input string:</label>
    <input type="text" name="input" id="input"/>
    <input type="submit" value="Submit"/>
</form>


<?php
if(isset($_POST['input'])) :
    ?>
    <table border="1">
        <?php
        $numbers = explode(", ", $_POST['input']);
        foreach($numbers as $num) {
            if(!is_numeric($num)) {
                ?>
                <tr>
                    <td><?= $num ?></td>
                    <td>I cannot sum that</td>
                </tr>
                <?php
                continue;
            }
            $sum = array_sum(str_split($num));
            ?>
            <tr><td><?= $num ?></td><td><?= $sum ?></td></tr>
        <?php } ?>
    </table>
<?php
endif;
?>
</body>
</html>