<!DOCTYPE html>
<html>
<head>
    <title>Calculate Interest</title>
    <style>
        input {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <form method="get">
        Enter Amount <input type="text" name="amount"><br>
        <input type="radio" name="currency" value="USD">USD
        <input type="radio" name="currency" value="EUR">EUR
        <input type="radio" name="currency" value="BGN">BGN<br>
        Compound Interest Amount <input type="text" name="interest"><br>
        <select name="period">
            <option value="6">6 Months</option>
            <option value="12">12 Months</option>
            <option value="24">2 Years</option>
            <option value="60">5 Years</option>
        </select>
        <input type="submit" value="Calculate">
    </form>

<?php
if(isset($_GET['period']) && isset($_GET['currency']) && isset($_GET['interest']) && isset($_GET['period'])) {
    $interest = $_GET['interest'] / 12 / 10;
    $period = (int)$_GET['period'];
    $value = (float)$_GET['amount'];
    $currency = $_GET['currency'];
    if($currency == "USD") {
        $currency = "&#36";
    }
    else if ($currency == "EUR") {
        $currency = "&#128";
    }
    else {
        $currency = "лв";
    }
    while($period > 0) {
        $value += $value * $interest / 10;
        $period--;
    }
}
?>
    <p><?php echo $currency . " " . number_format($value, 2, '.', '') ?></p>
</body>
</html>