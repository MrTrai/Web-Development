<?php
require_once 'login.php';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$question = "Who wrote Harry Potter?";
$answer1 = "Rowling";
$answer2 = "Hillary Clinton";
$answer3 = "Barack Obama";
$answer4 = "Me";
$correct = "Rowling";

$question = "Who wrote MacBeth?";
$answer1 = "Rowling";
$answer2 = "William Shakespear";
$answer3 = "Barack Obama";
$answer4 = "Me";
$correct = "William Shakespear";

//fetch table rows from mysql db
$sql = "INSERT INTO EnglishQuestions (Question, Answer1, Answer2, Answer3, Answer4, CorrectAnswer)
    VALUES ('$question', '$answer1', '$answer2', '$answer3', '$answer4', '$correct')";
$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));


$question = "What causes raining?";
$answer1 = "Water";
$answer2 = "Fire";
$answer3 = "Rock";
$answer4 = "Tree";
$correct = "Water";


$question = "What causes fire?";
$answer1 = "Water";
$answer2 = "Fire";
$answer3 = "Rock";
$answer4 = "Tree";
$correct = "Fire";
//fetch table rows from mysql db
$sql = "INSERT INTO ScienceQuestions (Question, Answer1, Answer2, Answer3, Answer4, CorrectAnswer)
    VALUES ('$question', '$answer1', '$answer2', '$answer3', '$answer4', '$correct')";
$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));


$question = "What is 2 * 10?";
$answer1 = "20";
$answer2 = "10";
$answer3 = "30";
$answer4 = "1";
$correct = "20";

$question = "What is 3 - 10?";
$answer1 = "-7";
$answer2 = "10";
$answer3 = "30";
$answer4 = "1";
$correct = "-7";

//fetch table rows from mysql db
$sql = "INSERT INTO MathQuestions (Question, Answer1, Answer2, Answer3, Answer4, CorrectAnswer)
    VALUES ('$question', '$answer1', '$answer2', '$answer3', '$answer4', '$correct')";
$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));


$question = "Who is Abraham Lincoln?";
$answer1 = "Farmer";
$answer2 = "Chief";
$answer3 = "Guard";
$answer4 = "President of US";
$correct = "President of US";

$question = "Who is Barack Obama?";
$answer1 = "Farmer";
$answer2 = "Chief";
$answer3 = "Guard";
$answer4 = "President of US";
$correct = "President of US";

//fetch table rows from mysql db
$sql = "INSERT INTO HistoryQuestions (Question, Answer1, Answer2, Answer3, Answer4, CorrectAnswer)
    VALUES ('$question', '$answer1', '$answer2', '$answer3', '$answer4', '$correct')";
$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

echo "Success";
//close the db connection
mysqli_close($conn);
?>

