<!DOCTYPE html>
<html>
<head>
    <title>Modify String</title>
</head>
<body>
    <form method="post">
        <input type="text" name="text">
        <input type="radio" name="option" value="palindrome">Check Palindrome
        <input type="radio" name="option" value="reverse">Reverse String
        <input type="radio" name="option" value="split">Split
        <input type="radio" name="option" value="hash">Hash String
        <input type="radio" name="option" value="shuffle">Shuffle String
        <br>
        <input type="submit">
    </form>
    <?php
        if(isset($_POST['text']) && isset($_POST['option'])) {
            $string = $_POST['text'];
            $action = $_POST['option'];
            $modifiedString = '';

            //We can also use a switch here but right now I don't feel like it. It would provide better performance for sure.

            if($action == 'palindrome') {
                if($string == strrev($string)) {
                    $modifiedString = strrev($string);
                }
                else {
                    $modifiedString = "$string is not a palindrome";
                }
            }

            if($action == 'reverse') {
                $modifiedString = strrev($string);
            }

            if($action == 'split') {
                $strArray = str_split($string);
                $modifiedString = implode(" ", $strArray);
            }

            if($action == 'hash') {
                $modifiedString = crypt($string);
            }

            if($action == 'shuffle') {
                $modifiedString = str_shuffle($string);
            } ?>
            <span><?= $modifiedString ?></span>
    <?php
        }
    ?>
</body>
</html>