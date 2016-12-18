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
$sql = "DELETE FROM MyGuests
    WHERE firstname='$logName'
    AND lastname='$logPassword'";

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
/* //get last iserted ID */
/* if (mysqli_query($conn, $sql)) { */
/*     $last_id = mysqli_insert_id($conn); */
/*     echo "New record created successfully. Last inserted ID is: " . $last_id; */
/* } else { */
/*     echo "Error: " . $sql . "<br>" . mysqli_error($conn); */
/* } */
mysqli_close($conn);
?>
