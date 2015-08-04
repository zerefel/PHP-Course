<!DOCTYPE html>
<html>
<head>
    <title>Count Divs</title>
</head>
<body>
    <h2>Enter HTML Tags:</h2><br>
    <form method="get">
        <input type="text" name="tags">
        <input type="submit">
    </form>
<?php
$htmlFiveTags = ['a',
    'abbr',
    'acronym',
    'address',
    'area',
    'b',
    'base',
    'bdo',
    'big',
    'blockquote',
    'body',
    'br',
    'button',
    'caption',
    'cite',
    'code',
    'col',
    'colgroup',
    'dd',
    'del',
    'dfn',
    'div',
    'dl',
    'DOCTYPE',
    'dt',
    'em',
    'fieldset',
    'form',
    'h1, h2, h3, h4, h5, and h6',
    'head',
    'html',
    'hr',
    'i',
    'img',
    'input',
    'ins',
    'kbd',
    'label',
    'legend',
    'li',
    'link',
    'map',
    'meta',
    'noscript',
    'object',
    'ol',
    'optgroup',
    'option',
    'p',
    'param',
    'pre',
    'q',
    'samp',
    'script',
    'select',
    'small',
    'span',
    'strong',
    'style',
    'sub',
    'sup',
    'table',
    'tbody',
    'td',
    'textarea',
    'tfoot',
    'th',
    'thead',
    'title',
    'tr',
    'tt',
    'ul',
    'var',
    'iframe'];
session_start();
if(isset($_GET['tags'])) {
    if(!isset($_SESSION['counter'])) {
        $_SESSION['counter'] = 0;
    }
    else {
        $tag = $_GET['tags'];
        if(in_array($tag, $htmlFiveTags)) {
            $_SESSION['counter']++; ?>
            <h1>Valid HTML 5 Tag! Your score is: <?= $_SESSION['counter'];?></h1>
            <?php
        }
        else { ?>
            <h1>Invalid HTML 5 Tag! Your score is: <?= $_SESSION['counter'];?></h1>
            <?php
        }
         ?>
    <?php
    }
}
?>
</body>
</html>