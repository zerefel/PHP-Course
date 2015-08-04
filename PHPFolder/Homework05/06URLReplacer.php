<?php
if (isset( $_GET[ 'text' ] ) && !empty( $_GET[ 'text' ] )) {
    $text = str_replace( '</a>', '[/URL]', $_GET[ 'text' ] );
    $text = str_replace( '<a href="', '[URL=', $text );
    $text = str_replace( '">', ']', $text );
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>URL Replacer</title>
</head>
<body>
<main>
    <form>
        <textarea name="text"></textarea>
        <input type="submit" value="Generate">
    </form>
    <?php if (isset($text)) { ?>
        <p><?= htmlspecialchars($text) ?></p>
    <?php } ?>
</main>
</body>
</html>