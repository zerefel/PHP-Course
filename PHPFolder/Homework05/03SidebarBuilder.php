<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Sidebar Builder</title>

</head>
<body>
<form method="post">
    <label for="categories">Categories: <input type="text" name="categories"></label>
    <label for="tags">Tags: <input type="text" name="tags"></label>
    <label for="months">Months: <input type="text" name="months"></label>
    <input type="submit" name="submit" value="Generate">
</form>

<?php if (isset($_POST['submit']) && isset($_POST['categories']) && isset($_POST['tags']) && isset($_POST['months'])):
    $categories = explode(", ", $_POST['categories']);
    $tags = explode(", ", $_POST['tags']);
    $months = explode(", ", $_POST['months']); ?>

    <aside>
        <h2>Categories</h2>
        <ul>
            <?php foreach ($categories as $categoryEntry): ?>
                <li><a href=#><?php echo htmlspecialchars($categoryEntry); ?></a></li>
            <?php endforeach; ?>
        </ul>
    </aside>

    <aside>
        <h2>Tags</h2>
        <ul>
            <?php foreach ($tags as $tagEntry): ?>
                <li><a href=#><?php echo htmlspecialchars($tagEntry); ?></a></li>
            <?php endforeach; ?>
        </ul>
    </aside>

    <aside>
        <h2>Months</h2>
        <ul>
            <?php foreach ($months as $monthEntry): ?>
                <li><a href=#><?php echo htmlspecialchars($monthEntry); ?></a></li>
            <?php endforeach; ?>
        </ul>
    </aside>

<?php endif; ?>

</body>
</html>