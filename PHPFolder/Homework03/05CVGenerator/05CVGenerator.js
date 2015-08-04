var languageId = 0;
var programmingLanguageId = 0;

function addLanguage() {
    var parentDiv = document.getElementById("languages");
    var newDiv = document.createElement("div");
    languageId++;
    newDiv.setAttribute("id", "language" + languageId);
    newDiv.innerHTML = "<input type=\"text\" name=\"languages[]\"> " +
    "<select name=\"comprehension[]\"> " +
    "<option selected disabled>-Comprehension-</option> " +
    "<option value=\"Very Advanced\">Very Advanced</option> " +
    "<option value=\"Advanced\">Advanced</option> " +
    "<option value=\"Intermediate\">Intermediate</option> " +
    "<option value=\"Elementary\">Elementary</option> " +
    "</select> " +
    "<select name=\"reading[]\">" +
    "<option selected disabled>-Reading-</option>" +
    "<option value=\"Very Advanced\">Very Advanced</option>" +
    "<option value=\"Advanced\">Advanced</option> " +
    "<option value=\"Intermediate\">Intermediate</option> " +
    "<option value=\"Elementary\">Elementary</option> " +
    "</select> " +
    "<select name=\"writing[]\">" +
    "<option selected disabled>-Writing-</option>" +
    "<option value=\"Very Advanced\">Very Advanced</option>" +
    "<option value=\"Advanced\">Advanced</option>" +
    "<option value=\"Intermediate\">Intermediate</option>" +
    "<option value=\"Elementary\">Elementary</option>" +
    "</select>" +
    "<br>";
    parentDiv.appendChild(newDiv);

}

function removeLanguage() {
    var language = document.getElementById("language" + languageId);
    document.getElementById('languages').removeChild(language);
    languageId--;
}

function addProgrammingLanguage() {
    var parentDiv = document.getElementById('programmingLanguages');
    var newDiv = document.createElement("div");
    programmingLanguageId++;
    newDiv.setAttribute("id", "prog-lang" + programmingLanguageId);
     newDiv.innerHTML = "<input type=\"text\" name=\"programmingLanguages[]\">" +
    "<select name=\"prog-lang-comprehension[]\">" +
    "<option value=\"Beginner\">Beginner</option>" +
    "<option value=\"Advanced\">Advanced</option>" +
    "<option value=\"Very Advanced\">Very Advanced</option>" +
    "<option value=\"Nakov\">Nakov</option>" +
    "</select>";
    parentDiv.appendChild(newDiv);
}

function removeProgrammingLanguage() {
    var progLanguage = document.getElementById("prog-lang" + programmingLanguageId);
    document.getElementById("programmingLanguages").removeChild(progLanguage);
    programmingLanguageId--;
}