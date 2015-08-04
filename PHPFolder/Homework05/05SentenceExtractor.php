<!DOCTYPE html>
<html>
<head>
    <title>Sentence Extractor</title>
</head>
<body>
<form method="post">
    <label for="text">Enter the text: </label>
    <textarea name="text" id="text"></textarea>
    <label for="search-word">Enter the search word: </label>
    <input type="text" name="search-word" >
    <input type="submit" name="submit" value="Find">
</form>

<?php
if (isset($_POST['submit']) && isset($_POST['text']) && isset($_POST['search-word'])):
    $word = $_POST['search-word'];
    $pattern = "/\\b[^.!?]*\\b" . $word . "\\b[^.!?]*[?!.]/";
    preg_match_all($pattern, $_POST['text'], $matches);
    if (count($matches) > 0):
        foreach ($matches[0] as $sentence): ?>
                <p><?php echo htmlentities($sentence); ?></p>
            <?php endforeach; ?>
    <?php else: ?>
        <h2>No results found!</h2>
    <?php
    endif;
endif; ?>
</body>
</html>