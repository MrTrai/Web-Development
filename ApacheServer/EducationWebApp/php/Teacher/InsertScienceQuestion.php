<?php
require_once 'login.php';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$question = $_REQUEST['question'];
$answer1 = $_REQUEST['answer1'];
$answer2 = $_REQUEST['answer2'];
$answer3 = $_REQUEST['answer3'];
$answer4 = $_REQUEST['answer4'];
$correct = $_REQUEST['correct'];

//fetch table rows from mysql db
$sql = "INSERT INTO ScienceQuestions (Question, Answer1, Answer2, Answer3, Answer4, CorrectAnswer)
    VALUES ('$question', '$answer1', '$answer2', '$answer3', '$answer4', '$correct')";
$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

//close the db connection
mysqli_close($conn);
?>

