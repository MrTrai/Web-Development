<?php
require_once 'login.php';

$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

if (!$db_server) {
    die("Unable to connect MYSQL" . mysqli_error());
} else {
    echo "Test!";
}

/* $db_database = 'otherDB'; */

/* mysqli_select_db('otherDB', $db_server) */
/*     or die( "<br/> fail to connect database!" . mysqli_error() ); */

/* echo "<br> Success"; */

$query = "SELECT * FROM MyGuests";
$result = mysqli_query($db_server, $query);

//Access database
if (!$result) {
    die("Table access failed" . mysqli_error());
} else {
    echo "<br>Table access success!<br><br><br><br>";
}

//delete all
if (isset($_POST['all'])) {
    $query = "TRUNCATE TABLE MyGuests";
    if (!mysqli_query($db_server, $query)) {
        echo "Delete all failed" . mysqli_error();
    } else {
        echo "Success";
    }
}


//delete record
if (isset($_POST['delete']) &&
    isset($_POST['id'])) {
    $id = mysqli_real_escape_string($db_server, $_POST['id']);
    $query = "DELETE FROM MyGuests WHERE id='$id'";

    if (!mysqli_query($db_server, $query)) {
        echo "DELETE FAILED!" . 
        mysqli_error() . "<br><br><br><br>";
    } else {
        echo "Delete Success!";
    }
}

//insert record
if (isset($_POST['firstname']) &&
    isset($_POST['lastname']) &&
    isset($_POST['email'])) {
        $firstname = mysqli_real_escape_string($db_server, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($db_server, $_POST['lastname']);
        $email = mysqli_real_escape_string($db_server, $_POST['email']);
        $query = "INSERT INTO MyGuests (firstname, lastname, email)
        VALUES('$firstname', '$lastname', '$email')";
        
        if (!mysqli_query($db_server, $query)) {
            echo "INSERT FAILED!" . 
            mysqli_error() . "<br><br><br><br>";
        } else {
            echo "Delete Success!";
        }
}

echo <<<_END
<form action="connect.php" method="post">
    <pre>
    First Name: <input type="text" name="firstname" />
    Last Name:  <input type="text" name="lastname" />
    Email:      <input type="text" name="email" />
                <input type="submit" value="Add Record" />
    </pre>
</form>
_END;

$rows = mysqli_num_rows($result);

for ($j = 0; $j < $rows; $j++) {

    $row = mysqli_fetch_row($result);

    /* echo 'First name: ' . $row[1] . '<br>'; */
    /* echo 'Last name: ' . $row[2] . '<br>'; */
    /* echo 'Email: ' . $row[3] . '<br>'; */
echo <<<_END
First name: $row[1] <br />
Last name: $row[2] <br />
Email: $row[3] <br />
ID: $row[0] <br />

    <form action="connect.php" method="post">
        <pre>
        <input type="hidden" name="delete" value="yes"/>
        <input type="hidden" name="id" value="$row[0]"/>
        <input type="submit" value="Delete Record" />
        </pre>
    </form>
_END;
}

echo <<<_END
    <form action="connect.php" method="post">
        <pre>
        <input type="hidden" name="all" value="yes" />
        <input type="submit" value="Delete ALL" />
        </pre>
    </form>
_END;


mysqli_close($db_server);
?>
