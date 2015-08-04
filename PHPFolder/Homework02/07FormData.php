<!DOCTYPE html>
<html>
<head>
    <style>
        label {  display: block;  }
        form > input {  display: block;  }
        input { margin-top: 5px;    };
    </style>
</head>
<body>
    <form action=" " method="get">
        <input type="text" name="name" placeholder="Name...">
        <input type="number" name="age" placeholder="Age...">
        <label><input type="radio" name="sex" value="Male">Male</label>
        <label><input type="radio" name="sex" value="Female">Female</label>
        <input type="submit">
    </form>
    <?php
    if(isset($_GET["name"]) && isset($_GET["age"]) && isset($_GET["sex"])) { ?>
        <p>My name is <?php echo htmlentities($_GET["name"])?>. I am <?php echo htmlentities($_GET["age"])?> years old. I am <?php echo htmlentities($_GET["sex"]) ?>.</p>
    <?php }
    ?>
</body>
</html>