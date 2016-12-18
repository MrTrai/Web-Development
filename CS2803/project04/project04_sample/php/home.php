<!DOCTYPE html>
<html>
    <head>
        <title>Student Management</title>
        <link rel="stylesheet" href="../css/stylesHome.css" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Londrina+Sketch" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Architects+Daughter" rel="stylesheet">
        <script type="text/javascript" src="../js/scriptsHome.js"></script>
    </head>

    <body>
        <!--<form id="homeForm" method="post" enctype="multipart/form-data"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"></form>-->
        <div id="passwordBox">
            <form method="GET" action="#">
                <input type="button" id="closeX" name="closeX" value="X" onclick="document.getElementById('passwordBox').style.visibility = 'hidden';"/>
                <div id="passwordBoxInfo">
                    <p>Please Enter Your Password</p>
                    <input id="userpwd" type="text" name="userpwd" onkeydown="javascript: if(event.keyCode == 13){ checkPassword(); return false;}"/>/>
                    <input id="userid" type="hidden" name="userid"/>
                    <!--<input type="button" value="OPEN" onclick="checkPassword();">-->
                </div>
            </form>
            <div id="passwordCheckReplyBox"></div>
        </div>

        <div id="window">
        <div class="tile row1 col1" id="teacher"><div id="teacherText">Fourth Grade</div></div>


    </body>
</html>

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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Check to determine if "Enter Data" button was selected
    if ($_POST["submitType"] == "enterRecord"){
        //Inspect Data
        // echo '<pre>';
        // print_r($row["IMAGE"]); //$row["IMAGE"]
        // echo '</pre>';

        //Enter Data into Table
        //Set up the query
        $password = addslashes($_POST['password']);
        $fname = addslashes($_POST['fname']);
        $lname = addslashes($_POST['lname']);
        $grade = addslashes($_POST['grade']);
        $imagename = addslashes($_FILES['image']['name']);
        $image = base64_encode(file_get_contents($_FILES['image']['tmp_name'])); //mysqli_real_escape_string($con, ;
        $sql = "INSERT INTO studentInformation (PASSWORD, FNAME, LNAME, GRADE, IMAGENAME, IMAGE)
        VALUES ('$password', '$fname', '$lname', '$grade', '$imagename', '$image')";

        //Execute query and test
        if (!mysqli_query($con, $sql)) {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        } else {
            echo "Record Entered";
        }
    }
}




//Extract images from data table to display on screen
$sql = "SELECT * from studentInformation"; // WHERE IMAGENAME='$imagename'";
$results = mysqli_query($con,$sql) or die("Invalid query: " . mysqli_error());
$count = 0;
if ( mysqli_num_rows($results) > 0 ){
    while( $row = mysqli_fetch_assoc($results)){
        if( $row["GRADE"] <> 0 ){
            $r = floor( $count / 4 )+2;
            $c = ($count % 4)+1;
            echo '<div class="tile row'. $r . ' col' . $c . '" id="' . $row['ID'] . '" onclick="showPasswordEntry(this);">';
            echo '<img class="imgTile" src="data:image/jpeg;base64,' . $row['IMAGE'] . '" />';
            echo '<div id="text' . $count . '">' . $row['FNAME'] . '<br>' . $row['LNAME'] . '</div>';
            echo '</div>';
            $count=$count + 1;
        } else {
            echo '<div class="tile row1 col4" id="' . $row['ID'] . '" onclick=alert(this.id)">';
            echo '<img class="imgTile" src="data:image/jpeg;base64,' . $row['IMAGE'] . '" />';
            echo '<div id="text0">' . $row['FNAME'] . '<br>' . $row['LNAME'] . '</div>';
            echo '</div>';
        }
    }
}
echo '</div>';

//Close connection to server<
mysqli_close($con);

?>