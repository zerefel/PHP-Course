<!DOCTYPE html>
<html>
<head>
    <title>Text Filter</title>
</head>
<body>
<form method="post">
    <label for="text">Enter text:</label>
    <textarea name="text"></textarea>
    <label for="ban-list">Enter banned words:</label>
    <input type="text" name="banned-list">
    <input type="submit" name="submit" value="Filter Text">
</form>
<div>
    <?php
    if (isset($_POST['submit']) && isset($_POST['text']) && isset($_POST['banned-list'])): ?>
        <h2>Filtered text:</h2>
        <?php
        $banned = explode(", ", $_POST['banned-list']);
        $output = $_POST['text'];
        foreach ($banned as $word) {
            $replaceString = str_repeat('*', strlen($word));
            $output = str_replace($word, $replaceString, $output);
        }
        echo htmlspecialchars($output);
    endif;
    ?>
</div>
</body>
</html>