<?php
$recipient = htmlspecialchars($_GET['recipient']);
$subject = htmlspecialchars($_GET['subject']);
$messageBody =  htmlspecialchars($_GET['body']);
$encryptionKey = $_GET['key'];

$message = "<p class='recipient'>$recipient</p>"."<p class='subject'>$subject</p>"."<p class='message'>$messageBody</p>";
$keyLength = strlen($encryptionKey);
$encryptedMessage = '|';
$keyCounter = 0;

for($i = 0; $i < strlen($message); $i++) {
    if($keyCounter == $keyLength) {
        $keyCounter = 0;
    }
    $encryptedChar = '';

    $decimalValue = (ord($message[$i]) * ord($encryptionKey[$keyCounter]));
    $hexValue = dechex($decimalValue);
    $encryptedChar = $hexValue . '|';
    if($i == strlen($message)) {
        $encryptedChar .= '|';
    }
    $encryptedMessage .= $encryptedChar;

    $keyCounter++;
}
echo $encryptedMessage;