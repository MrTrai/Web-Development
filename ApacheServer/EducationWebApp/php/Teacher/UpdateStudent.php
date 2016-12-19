
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

$Username = $_REQUEST['Username'];
$Email = $_REQUEST['Email'];;
$Password = $_REQUEST['Password'];
$MathCorrect = $_REQUEST['MathCorrect'];
$ScienceCorrect = $_REQUEST['ScienceCorrect'];
$HistoryCorrect = $_REQUEST['HistoryCorrect'];
$EnglishCorrect = $_REQUEST['EnglishCorrect'];

//Update
$sql = "UPDATE Students
    SET Email='$Email', MathCorrect='$MathCorrect', ScienceCorrect='$ScienceCorrect', HistoryCorrect='$HistoryCorrect', EnglishCorrect='$EnglishCorrect'
 WHERE Username='$Username'";

//check error
$result = mysqli_query($conn, $sql);
if ($result) {
    echo "Succeed";
} else {
    echo "Error";
}

mysqli_close($conn);
?>
