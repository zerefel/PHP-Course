<!DOCTYPE html>
<html>
<head>
    <title>Prime numbers in range</title>
</head>
<body>
    <form method="get">
        <input type="text" name="from" placeholder="From">
        <input type="text" name="to" placeholder="To">
        <input type="submit">
    </form>
    <?php
        if(isset($_GET['from']) && isset($_GET['to'])) {
            $rangeFrom = $_GET['from'];
            $rangeTo = $_GET['to'];

            for($i = $rangeFrom; $i <= $rangeTo; $i++) {
                if(isPrime($i)) { ?>
                    <span style="font-weight: bold; font-size: 20px"><?= $i?></span>
                    <?php
                }
                else { ?>
                    <span><?= $i?></span>
                <?php
                }
            }
        }

    function isPrime($num) {
        if($num == 1)
            return false;

        if($num == 2)
            return true;

        if($num % 2 == 0) {
            return false;
        }

        for($i = 3; $i <= ceil(sqrt($num)); $i = $i + 2) {
            if($num % $i == 0)
                return false;
        }

        return true;
    }
    ?>
</body>
</html>