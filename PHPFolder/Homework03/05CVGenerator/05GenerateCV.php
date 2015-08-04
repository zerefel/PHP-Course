<!DOCTYPE html>
<html>
<head>
    <title>Your CV</title>
    <style>
        table, th, td {
            border: 1px solid black;
        }
        body > table {
            margin-top: 20px;
        }
        td {
            padding: 0 25 0 5;
        }
    </style>
</head>
<body>
<?php

if(isset($_GET['fname']) && isset($_GET['lname']) && isset($_GET['email']) && isset($_GET['phone']) && isset($_GET['sex'])
    && isset($_GET['nationality']) && isset($_GET['birthday']) && isset($_GET['company']) && isset($_GET['from']) &&
    isset($_GET['until']) && isset($_GET['languages']) && isset($_GET['comprehension']) && isset($_GET['reading']) &&
    isset ($_GET['writing']) && isset($_GET['programmingLanguages']) && isset($_GET['prog-lang-comprehension'])) {

//Input data is validated here, First Name, Last Name, Language -> Only letters between 2 and 20 symbols

    preg_match("/\\A[a-zA-Z]{2,20}+\\z/", $_GET['fname'], $firstName);
    preg_match("/\\A[a-zA-Z]{2,20}+\\z/", $_GET['lname'], $lastName);
    $languages = $_GET['languages'];
    for ($i = 0; $i < sizeof($languages); $i++) {
        preg_match("/\\A[a-zA-Z]{2,20}+\\z/", $languages[$i], $matchedLanguages);
    }

//Company name must be only letters and numbers between 2 and 20 symbols
    preg_match("/\\A[a-zA-Z0-9]{2,20}+\\z/", $_GET['company'], $company);

//Phone number must be only numbers, '+', '-' or a single whitespace ' '
    preg_match("/\\A[0-9 \\+\\-]+\\z/", $_GET['phone'], $phone);

//E-mail must be only letters, numbers, one @, one '.'
    preg_match("/\\A\\w+@\\w+\\.\\w+\\z/", $_GET['email'], $email);

    $sex = $_GET['sex'];
    $nationality = $_GET['nationality'];
    $birthday = $_GET['birthday'];
    $periodFrom = $_GET['from'];
    $periodUntil = $_GET['until'];
    $comprehension = $_GET['comprehension'];
    $reading = $_GET['reading'];
    $writing = $_GET['writing'];
    $licenses = $_GET['license'];
    $programmingLanguages = $_GET['programmingLanguages'];
    $progLangComprehension = $_GET['prog-lang-comprehension'];

    if (sizeof($firstName > 0) && sizeof($lastName > 0) && sizeof($matchedLanguages > 0) && sizeof($company) > 0 && sizeof($phone) > 0 && sizeof($email) > 0) {
        ?>

        <h1>CV</h1>
        <table>
            <thead>
            <tr>
                <th colspan="2">Personal Information</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>First Name</td>
                <td><?= $firstName[0] ?></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><?= $lastName[0] ?></td>
            </tr>
            <tr>
                <td>E-Mail</td>
                <td><?= $email[0] ?></td>
            </tr>
            <tr>
                <td>Phone Number</td>
                <td><?= $phone[0] ?></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><?= $sex ?></td>
            </tr>
            <tr>
                <td>Birth Date</td>
                <td><?= $birthday ?></td>
            </tr>
            <tr>
                <td>Nationality</td>
                <td><?= $nationality ?></td>
            </tr>
            </tbody>
        </table>

        <table>
            <thead>
            <tr>
                <th colspan="2">Last Work Position</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Company Name</td>
                <td><?= $company[0] ?></td>
            </tr>
            <tr>
                <td>From</td>
                <td><?= $periodFrom ?></td>
            </tr>
            <tr>
                <td>To</td>
                <td><?= $periodUntil ?></td>
            </tr>
            </tbody>
        </table>

        <table>
            <thead>
            <tr>
                <th colspan="2">Computer Skills</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Programming Languages</td>
                <td>
                    <table>
                        <thead>
                        <tr>
                            <th>Language</th>
                            <th>Skill Level</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        for ($lang = 0; $lang < sizeof($programmingLanguages); $lang++) {
                            ?>
                            <tr>
                                <td><?= $programmingLanguages[$lang] ?></td>
                                <td><?= $progLangComprehension[$lang] ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </td>
            </tr>
            </tbody>
        </table>

        <table>
            <thead>
            <tr>
                <th colspan="2">Other Skills</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Languages</td>
                <td>
                    <table>
                        <thead>
                        <tr>
                            <th>Language</th>
                            <th>Comprehension</th>
                            <th>Reading</th>
                            <th>Writing</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        for ($lang = 0; $lang < sizeof($languages); $lang++) {
                            ?>
                            <tr>
                                <td><?= $languages[$lang] ?></td>
                                <td><?= $comprehension[$lang] ?></td>
                                <td><?= $reading[$lang] ?></td>
                                <td><?= $writing[$lang] ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>Driver's License</td>
                <td>
                    <?php
                    for ($i = 0; $i < sizeof($licenses); $i++) {
                        ?>
                        <span><?= $licenses[$i] ?></span>
                    <?php
                    }
                    ?>
                </td>
            </tr>
            </tbody>
        </table>

    <?php
    }
    else {
        echo "You dumbass, check the requirements! And yes, this is a very friendly message!!!";
    }
}
?>
</body>
</html>