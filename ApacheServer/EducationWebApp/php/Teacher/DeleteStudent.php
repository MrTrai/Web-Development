<?php
require_once 'login.php';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$logName = $_REQUEST['username'];
$logEmail = $_REQUEST['email'];

//Insert
$sql = "DELETE FROM Students
    WHERE Username='$logName'
    AND Email='$logEmail'";

//check error
$result = mysqli_query($conn, $sql);
if ($result) {
    echo "Succeed";
} else {
    echo "Error";
}
echo $logName;
echo $logPassword;
echo $logEmail;

mysqli_close($conn);
?>
