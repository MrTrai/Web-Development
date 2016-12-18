<?php
//Set variables
$servername = "localhost";
$username = "cedrictstallwort";
$password = "";
$dbname = "STALLWORTHcedric";

// Create connection
$con=mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (mysqli_connect_errno())
  {
  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

//Check calling origin
$userid = $_GET["userid"];
$userpwd = $_GET["userpwd"];

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $sql = "SELECT PASSWORD from studentInformation WHERE ID='$userid'";
    $results = mysqli_query($con,$sql) or die("Invalid query: " . mysqli_error());

    if ( mysqli_num_rows($results) > 0 ){
        while( $row = mysqli_fetch_assoc($results)){
            if( $row["PASSWORD"] == "$userpwd" ){
                echo "Password Good";
            } else {
                echo "<p>Incorrect Password<br>Please Retry</p>";
            }
        }
    }
}

//Close connection to server<
mysqli_close($con);
?>