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
$sql = "INSERT INTO MyGuests (firstname, lastname)
VALUES ('$logName', '$logPassword')";

//check error
if ( mysqli_query($conn, $sql)) {
    echo "Succeed!";
} else {
    echo "Error!";
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
