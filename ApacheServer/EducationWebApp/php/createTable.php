<?php
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "myDB";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to create table
//Teacher table
$sql = "CREATE TABLE Teachers (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    password varchar(30) NOT NULL,
    MathTotalQuestion INT(10) UNSIGNED,
    ScienceTotalQuestion INT(10) UNSIGNED,
    HistoryTotalQuestion INT(10) UNSIGNED,
    EnglishTotalQuestion INT(10) UNSIGNED,
    email VARCHAR(50),
    reg_date TIMESTAMP
)";

/* create table Student */
/* ( */
/* StudentID int, */
/* FirstName varchar(255), */
/* LastName varchar(255), */
/* Email varchar(255), */
/* Password varchar(255), */
/* MathCorrect int, */
/* MathTotalAnswered int, */
/* ScienceCorrect int, */
/* ScienceTotalAnswered int, */
/* HistoryCorrect int, */
/* HistoryTotalAnswered int, */
/* EnglishCorrect int, */
/* EnglishTotalAnswered int */
/* ); */

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

//Questions
$sql2 = "CREATE TABLE Questions (
    Question varchar(255) NOT NULL,
    Answer1 varchar(255) NOT NULL,
    Answer2 varchar(255) NOT NULL,
    Answer3 varchar(255) NOT NULL,
    Answer4 varchar(255) NOT NULL,
    CorrectAnswer varchar(255) NOT NULL
)";

if (mysqli_query($conn, $sql1)) {
    echo "Table Question created successfully";
} else {
    echo "Error creating tabl: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
