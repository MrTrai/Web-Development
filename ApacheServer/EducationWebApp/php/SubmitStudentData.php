<?php
require_once 'login.php';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$logName = $_REQUEST['username'];
$logPassword = $_REQUEST['password'];
$logEmail = $_REQUEST['email'];

//Insert
$sql = "INSERT INTO Students (Username, Email, Password)
    VALUES ('$logName', '$logEmail', '$logPassword')";

//check error
if ( mysqli_query($conn, $sql)) {
    echo "Succeed!";
} else {
    echo "Error!";
}

mysqli_close($conn);
?>
