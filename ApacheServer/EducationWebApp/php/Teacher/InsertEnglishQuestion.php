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

$question = $_POST['question'];
$answer1 = $_POST['answer1'];
$answer2 = $_POST['answer2'];
$answer3 = $_POST['answer3'];
$answer4 = $_POST['answer4'];
$correct = $_POST['correct'];

//fetch table rows from mysql db
$sql = "INSERT INTO EnglishQuestions (Question, Answer1, Answer2, Answer3, Answer4, CorrectAnswer)
    VALUES ('$question', '$answer1', '$answer2', '$answer3', '$answer4', '$correct')";
$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

//close the db connection
mysqli_close($connection);
?>

