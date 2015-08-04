<!DOCTYPE html>
<html>
<head>
    <title>Word Mapper</title>
</head>
<body>
<form method="post">
    <textarea name="input-field"></textarea>
    <input type="submit" value="Count words" name="submit">
</form>
<div>
    <?php if (isset($_POST['submit']) && isset($_POST['input-field'])):
        preg_match_all("/\\w+/", strtolower($_POST['input-field']), $words);
        $map = array();
        foreach ($words[0] as $word) {
            if (!array_key_exists($word, $map)) {
                $map[$word] = 1;
            } else {
                $map[$word]++;
            }
        }
        ?>
        <table border="1">
            <?php foreach($map as $key=>$value): ?>
                <tr><td><?php echo htmlentities($key) ?></td><td><?php echo $value ?></td></tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>
</body>
</html>