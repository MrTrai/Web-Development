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

$name = $_POST['username'];
$email = $_POST['email'];

//fetch table rows from mysql db
$sql = "INSERT INTO Students (Username, Email)
    VALUES ('$name', '$email')";
$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

//close the db connection
mysqli_close($connection);
?>

