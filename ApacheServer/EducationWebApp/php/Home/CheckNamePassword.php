<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$logName = $_REQUEST['username'];
$logPassword = $_REQUEST['password'];

//Insert
$sql = "SELECT Username, Password, Email, MathCorrect, MathTotalAnswered, ScienceCorrect, ScienceTotalAnswered, HistoryCorrect, HistoryTotalAnswered, EnglishCorrect, EnglishTotalAnswered
    FROM Students
    WHERE Username='$logName'
    AND Password='$logPassword'";

//check error
$result = mysqli_query($conn, $sql);
$emparray = array();
if (mysqli_num_rows($result) > 0) {
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
    echo json_encode($emparray);
} else {
    echo "false";
}




mysqli_close($conn);
?>
