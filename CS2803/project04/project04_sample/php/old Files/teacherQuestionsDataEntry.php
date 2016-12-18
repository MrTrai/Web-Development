<?php
//Set variables
$servername = "localhost";
$username = "cedrictstallwort";
$password = "";
$dbname = "STALLWORTHcedric";

// Create connection
$con=mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (mysqli_connect_errno())
  {
  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }  else {
  	echo "Successfully Connected to MySQL<br/>" ;
  }


//Set up the query
$grade = $_POST['grade'];
$subject = $_POST['subject'];
$question = $_POST['question'];
$answer = $_POST['answer'];
$sql = "INSERT INTO questionAnswers (GRADE, SUBJECT, QUESTION, ANSWER)
VALUES ('". $grade . "', '" . $subject . "', '" . $question . "', '" . $answer . "')";

//Execute query and test
if (mysqli_query($con, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

//Close connection to server
mysqli_close($con);

?>