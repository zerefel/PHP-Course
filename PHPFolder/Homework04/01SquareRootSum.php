<!DOCTYPE html>
<html>
<head>
    <title>Squre Root Of Numbers</title>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>Number</th>
                <th>Square</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $sum = 0;
            for($i = 0; $i <= 100; $i += 2) {
                $number = $i;
                $squareNum = sqrt($number);
                $sum += $squareNum; ?>
                <tr>
                    <td><?=$number?></td>
                    <td><?=round($squareNum, 2)?></td>
                </tr>
                <?php
            }
        ?>
        <tr>
            <td>Sum:</td>
            <td><?=round($sum, 2)?></td>
        </tr>
        </tbody>
    </table>
</body>
</html>
