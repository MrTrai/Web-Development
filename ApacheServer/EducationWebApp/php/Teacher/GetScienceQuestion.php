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

//fetch table rows from mysql db
$sql = "select * from ScienceQuestions";
$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

//create an array
$emparray = array();
while($row =mysqli_fetch_assoc($result))
{
    $emparray[] = $row;
}

echo json_encode($emparray);

//close the db connection
mysqli_close($conn);
?>

