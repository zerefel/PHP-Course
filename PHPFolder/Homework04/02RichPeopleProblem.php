<!DOCTYPE html>
<html>
<head>
    <title>Rich People's Problems</title>
</head>
<body>
    <form method="post">
        <input type="text" name="cars" placeholder="Enter cars">
        <input type="submit">
    </form>
    <?php
    if(isset($_POST['cars'])) {
        $cars = preg_split("/, /", $_POST['cars']);
        $colors = ['yellow', 'green', 'magenta', 'shit', 'black'];
         ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Car</th>
                    <th>Color</th>
                    <th>Count</th>
                </tr>
            </thead>
            <tbody>
    <?php
        for($i = 0; $i < count($cars); $i++) {

            //There's also a function called array_rand() but I didn't quite figure out how to use it.
            //Give it a look if you will
            //I use the standard PHP random generator rand()

            $color = $colors[rand(0, 4)];
            $quantity = rand(1, 5);
            ?>
            <tr>
                <td><?= $cars[$i] ?></td>
                <td><?= $color ?></td>
                <td><?= $quantity ?></td>
            </tr>
    <?php
        }
    }
    ?>
            </tbody>
        </table>
</body>
</html>