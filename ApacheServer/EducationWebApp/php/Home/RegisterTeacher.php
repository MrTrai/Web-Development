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

$logName = $_REQUEST['username'];
$logPassword = $_REQUEST['password'];
$logEmail = $_REQUEST['email'];

//fetch table rows from mysql db
$sql = "INSERT INTO Teachers (Username, Password, Email)
    VALUES ('$logName', '$logPassword', '$logEmail')";
$result = mysqli_query($conn, $sql) or die("Error in Inserting " . mysqli_error($conn));

//close the db connection
mysqli_close($conn);
?>

