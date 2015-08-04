<!DOCTYPE html>
<html>
<head>
    <title>Coloring Text</title>
</head>
<body>
<form method="post">
    <input type="text" name="text">
    <input type="submit" name="submit">
</form>
<p>
    <?php if (isset($_POST['submit']) && isset($_POST['text'])):
        $sentence = $_POST['text'];
        foreach (str_split($sentence) as $letter):
            if (ord($letter) % 2 == 0): ?>
                <span style="color: red"><?php echo "$letter "; ?></span>
            <?php
            else: ?>
                <span style="color: blue"><?php echo "$letter "; ?></span>
            <?php
            endif;
        endforeach;
    endif;
    ?>
</p>
</body>
</html>