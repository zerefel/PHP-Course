<!DOCTYPE html>
<html>
<head>
    <title>Annual Expenses</title>
</head>
<body>
    <span>Enter number of years: </span>
    <form method="post">
        <input type="text" name="years">
        <input type="submit">
    </form>
    <?php
        if(isset($_POST['years'])) {
            $years = (int)$_POST['years'];
            $currentYear = (int)date('Y'); ?>
    <table border="1">
        <thead>
            <tr>
                <th>Year</th>
                <th>January</th>
                <th>February</th>
                <th>March</th>
                <th>April</th>
                <th>May</th>
                <th>June</th>
                <th>July</th>
                <th>August</th>
                <th>September</th>
                <th>October</th>
                <th>November</th>
                <th>December</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
        <?php
            for($i = $currentYear; $i >= $currentYear - $years; $i--) {
                $sum = 0;
        ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?php echo $exp1 = rand(0, 999); $sum += $exp1; ?></td>
                    <td><?php echo $exp2 = rand(0, 999); $sum += $exp2; ?></td>
                    <td><?php echo $exp3 = rand(0, 999); $sum += $exp3; ?></td>
                    <td><?php echo $exp4 = rand(0, 999); $sum += $exp4; ?></td>
                    <td><?php echo $exp5 = rand(0, 999); $sum += $exp5; ?></td>
                    <td><?php echo $exp6 = rand(0, 999); $sum += $exp6; ?></td>
                    <td><?php echo $exp7 = rand(0, 999); $sum += $exp7; ?></td>
                    <td><?php echo $exp8 = rand(0, 999); $sum += $exp8; ?></td>
                    <td><?php echo $exp9 = rand(0, 999); $sum += $exp9; ?></td>
                    <td><?php echo $exp10 = rand(0, 999); $sum += $exp10; ?></td>
                    <td><?php echo $exp11 = rand(0, 999); $sum += $exp11; ?></td>
                    <td><?php echo $exp12 = rand(0, 999); $sum += $exp12; ?></td>
                    <td><?= $sum ?></td>
                </tr>
        <?php
            }
        }
    ?>
        </tbody>
    </table>
</body>
</html>