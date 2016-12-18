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
/*
$sql = "INSERT INTO information (FNAME, LNAME, GRADE)
VALUES ('George', 'Burdell', '4')";
*/

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$grade = $_POST['grade'];
$sql = "INSERT INTO information (FNAME, LNAME, GRADE)
VALUES ('". $fname . "', '" . $lname . "', '" . $grade . "')";

//Execute query and test
if (mysqli_query($con, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

//Close connection to server
mysqli_close($con);

?>