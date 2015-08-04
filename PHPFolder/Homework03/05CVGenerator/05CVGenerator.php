<!DOCTYPE html>
<html>
<head>
    <title>Generate CV</title>
    <style>
        input, select {
            margin-top: 5px;
        }
    </style>
</head>
<body>
<script type="text/javascript" src="05CVGenerator.js"></script>
    <form action="05GenerateCV.php" method="get">
        <h3>Person Information</h3>
        <input type="text" placeholder="First Name" name="fname"><br>
        <input type="text" placeholder="Last Name" name="lname"><br>
        <input type="email" placeholder="Email" name="email"><br>
        <input type="text" placeholder="Phone Number" name="phone"><br>
        <input type="radio" name="sex" value="Male">Male
        <input type="radio" name="sex" value="Female">Female<br>
        Birth Date<br>
        <input type="date" name="birthday"><br>
        Nationality<br>
        <select name="nationality">
            <option value="Bulgarian">Bulgarian</option>
            <option value="Mangalian">Mangalian</option>
            <option value="Pomakian">Pomakian</option>
            <option value="Peshovian">Peshovian</option>
            <option value="Nakovian">Nakovian</option>
        </select>

    <h3>Last Work Position</h3>

        Company Name<input type="text" name="company"><br>
        From<input type="date" name="from"><br>
        To<input type="date" name="until">

    <h3>Computer Skills</h3>
        Programming Languages
        <div id="programmingLanguages">
            <script>addProgrammingLanguage()</script>
        </div>
        <a href="javascript:addProgrammingLanguage()">Add Programming Language</a>
        <a href="javascript:removeProgrammingLanguage()">Remove Programming Language</a><br>
    <h3>Other Skills</h3>
        Languages <br>
            <div id="languages">
                <script>addLanguage()</script>
            </div>
        <a href="javascript:addLanguage()">Add Language</a>
        <a href="javascript:removeLanguage()">Remove Language</a><br>
        Driver's License
        <input type="checkbox" value="B" name="license[]">B
        <input type="checkbox" value="A" name="license[]">A
        <input type="checkbox" value="C" name="license[]">C<br>
        <input type="submit" value="Generate CV">
    </form>
</body>
</html>