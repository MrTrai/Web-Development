<?php
<<<<<<< HEAD
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";
=======
require_once 'login.php';
>>>>>>> 84b5a85c37d66edd7f29a464c8681d7c0cbf19b3

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//Teacher table
$sql = "CREATE TABLE Teachers (
    Username VARCHAR(30) NOT NULL,
    Email VARCHAR(30) NOT NULL,
    Password varchar(30) NOT NULL,
    reg_date TIMESTAMP
)";

//Student table
$sql1 = "CREATE TABLE Students (
    Username VARCHAR(30) NOT NULL,
    Email VARCHAR(30) NOT NULL,
    Password varchar(30) NOT NULL,
    MathCorrect INT(10) UNSIGNED,
    MathTotalAnswered INT(10) UNSIGNED,
    ScienceCorrect INT(10) UNSIGNED,
    ScienceTotalAnswered INT(10) UNSIGNED,
    HistoryCorrect INT(10) UNSIGNED,
    HistoryTotalAnswered INT(10) UNSIGNED,
    EnglishCorrect INT(10) UNSIGNED,
    EnglishTotalAnswered INT(10) UNSIGNED,
    reg_date TIMESTAMP
)";

//Math Questions
$sql2 = "CREATE TABLE MathQuestions (
    Question varchar(255) NOT NULL,
    Answer1 varchar(255) NOT NULL,
    Answer2 varchar(255) NOT NULL,
    Answer3 varchar(255) NOT NULL,
    Answer4 varchar(255) NOT NULL,
    CorrectAnswer varchar(255) NOT NULL
)";

//Science
$sql3 = "CREATE TABLE ScienceQuestions (
    Question varchar(255) NOT NULL,
    Answer1 varchar(255) NOT NULL,
    Answer2 varchar(255) NOT NULL,
    Answer3 varchar(255) NOT NULL,
    Answer4 varchar(255) NOT NULL,
    CorrectAnswer varchar(255) NOT NULL
)";

//History
$sql4 = "CREATE TABLE HistoryQuestions (
    Question varchar(255) NOT NULL,
    Answer1 varchar(255) NOT NULL,
    Answer2 varchar(255) NOT NULL,
    Answer3 varchar(255) NOT NULL,
    Answer4 varchar(255) NOT NULL,
    CorrectAnswer varchar(255) NOT NULL
)";

//English
$sql5 = "CREATE TABLE EnglishQuestions (
    Question varchar(255) NOT NULL,
    Answer1 varchar(255) NOT NULL,
    Answer2 varchar(255) NOT NULL,
    Answer3 varchar(255) NOT NULL,
    Answer4 varchar(255) NOT NULL,
    CorrectAnswer varchar(255) NOT NULL
)";
if (mysqli_query($conn, $sql4)) {
    echo "Table Question created successfully";
} else {
    echo "Error creating tabl: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
