<?php
require_once 'login.php';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$questionName = $_REQUEST['questionName'];

//Insert
$sql = "DELETE FROM HistoryQuestions
    WHERE Question='$questionName'";

//check error
$result = mysqli_query($conn, $sql);
if ($result) {
    echo "Succeed";
} else {
    echo "Error";
}
mysqli_close($conn);
?>
