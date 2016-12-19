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
$result = mysqli_query($conn, $sql) or die("Error in Inserting " . mysqli_error($conn));
echo "success";
mysqli_close($conn);
?>