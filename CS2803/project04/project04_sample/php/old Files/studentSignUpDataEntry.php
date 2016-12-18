<?php

//Check calling origin
if ($_SERVER["REQUEST_METHOD"] == "POST") {

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
      }  else {
      	echo "Successfully Connected to MySQL<br/>" ;
      }


    //Set up the query
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $grade = $_POST['grade'];
    $image = $_POST['image'];
    $sql = "INSERT INTO studentInformation (FNAME, LNAME, GRADE, IMAGE)
    VALUES ('". $fname . "', '" . $lname . "', '" . $grade . "','" . $image ."')";

    //Execute query and test
    if (mysqli_query($con, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    $sql = "SELECT IMAGE from studentInformation WHERE ID=32";
    $result = mysqli_query($con, $sql) or die("Invalid query: " . mysqli_error());

    header("Content-type: image/jpeg");
    echo mysqli_result($result, 0);

    //Close connection to server
    mysqli_close($con);
}
?>