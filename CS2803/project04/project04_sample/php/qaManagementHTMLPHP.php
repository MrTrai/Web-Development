<!DOCTYPE html>
<html>
    <head>
        <title>Teacher Questions</title>
        <link rel="stylesheet" href="../css/styles.css" type="text/css" />
        <script type="text/javascript" src="../js/scripts.js"></script>
    </head>
    <body>
        <form id="qaForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

            Grade Level: <input type="text" name="grade" size="2"><br><br>
            Subject:
                <input type="radio" name="subject" value="english"> English &nbsp; &nbsp; |
                <input type="radio" name="subject" value="math"> Math &nbsp; &nbsp; |
                <input type="radio" name="subject" value="science"> Science &nbsp; &nbsp; |
                <input type="radio" name="subject" value="social"> Social Studies &nbsp; &nbsp; |
                <input type="radio" name="subject" value="art"> Art
                <br><br>
            Question: <textarea name="question" rows="5" cols="30"></textarea><br><br>
            Answer: <input type="text" name="answer" size="30"><br><br>
            <input type="button" value="Enter Question" onclick="enterRecord();">

            <hr>

            <?php
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
                  }

                //Enter Record
                if ($_POST["submitType"] == "enterRecord"){
                    //Set up the query
                    $grade = $_POST['grade'];
                    $subject = $_POST['subject'];
                    $question = $_POST['question'];
                    $answer = $_POST['answer'];
                    $sql = "INSERT INTO questionAnswers (GRADE, SUBJECT, QUESTION, ANSWER)
                    VALUES ('". $grade . "', '" . $subject . "', '" . $question . "', '" . $answer . "')";

                    //Execute query and test
                    if (!mysqli_query($con, $sql)) {
                        echo "Error: " . $sql . "<br>" . mysqli_error($con);
                    }
                }

                //Update record
                if ( strpos($_POST["submitType"], "updateRecord") !== false ){
                    $fieldQIDdata = explode("_",$_POST["submitType"]);
                    echo $fieldQIDdata[0];
                    echo $fieldQIDdata[1];
                    echo $fieldQIDdata[2];
                    $sql = "UPDATE questionAnswers SET " . $fieldQIDdata[0] . "='" . $_POST["updateData"] . "' WHERE QID='" . $fieldQIDdata[1] ."'";
                    //Execute and test
                    if (!mysqli_query($con, $sql)) {
                        echo "Error updating record: " . mysqli_error($con);
                    }
                }

                //Delete checked records
                if ((count($_POST["QID"]) > 0) && ($_POST["submitType"]=="deleteRecords")) {
                    foreach($_POST["QID"] as $id){
                        $sql = "DELETE FROM questionAnswers WHERE QID='" . $id . "'";
                        if (!mysqli_query($con, $sql)) {
                            echo "Error deleting record: " . mysqli_error($con);
                        }
                    }
                }

                //Select chosen records
                if (($_POST["submitType"] == "enterRecord") ||($_POST["submitType"] == "selectRecords") || ($_POST["submitType"]=="deleteRecords") || (strpos($_POST["submitType"], "updateRecord") !== false)){
                    //Set up query parts to search for user's selection
                    if ($_POST["selectedGrade"] == 'All'){
                        $gradeSearch = "";
                    } else {
                        $gradeSearch = "(GRADE = '" . $_POST["selectedGrade"] . "') ";
                    }

                    if ($_POST["selectedSubject"] == 'All'){
                        $subjectSearch = "";
                    } else {
                        $subjectSearch = "(SUBJECT = '" . $_POST["selectedSubject"] . "') ";
                    }

                    //Assemble query string from query parts
                    if ( ($gradeSearch=="") && ($subjectSearch=="") ){
                        $sql = "SELECT * FROM questionAnswers ";
                    } elseif ($gradeSearch=="") {
                        $sql = "SELECT * FROM questionAnswers  WHERE " . $subjectSearch;
                    } elseif ($subjectSearch=="") {
                        $sql = "SELECT * FROM questionAnswers  WHERE " . $gradeSearch;
                    } else {
                        $sql = "SELECT * FROM questionAnswers  WHERE " . $subjectSearch . " AND " . $gradeSearch;
                    }

                    //Run selection Query
                    $result = mysqli_query($con, $sql);

                    //Make output data table of selections
                    //Table Headers
                    echo ' <table id="dataTable"> ';
                    echo ' <tr> ';
                    echo ' <th><input id="delButton" type="button" name="delButton" value="del" onclick="deleteRecords();"></th>';
                    echo ' <th>QID</th><th>GRADE</th><th>SUBJECT</th><th>QUESTION</th><th>ANSWER</th> ';
                    echo ' </tr> ';

                    //Fill in table data from query results
                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td>' . '<input type="checkbox" name="QID[' . $row["QID"] . ']" value="' . $row["QID"] .'">';
                            echo '<td>' . $row["QID"] . '</td>';
                            echo '<td>' . $row["GRADE"] . '</td>';
                            echo '<td>' . $row["SUBJECT"] . '</td>';
                            echo '<td><span id="QUESTION_' . $row["QID"] . '" onclick="selectData(this);">' . $row["QUESTION"] . '</span></td>';
                            echo '<td><span id="ANSWER_'. $row["QID"] . '" onclick="selectData(this);">' . $row["ANSWER"] . '</span></td>';
                            echo "</tr>";
                        }
                    } else {
                        echo "0 results";
                    }

                    //End table
                    echo ' </table> ';
                }

                //Close server connection
                mysqli_close($con);
            }
            ?>

            <hr>

            <!-- User selection options -->
            Select Grade Level:
            <input type="radio" name="selectedGrade" value="All" checked> All &nbsp; &nbsp; |
            <input type="radio" name="selectedGrade" value="4"> 4th &nbsp; &nbsp; |
            <input type="radio" name="selectedGrade" value="5"> 5th &nbsp; &nbsp; |
            <br>
            Select Subject:
            <input type="radio" name="selectedSubject" value="All" checked> All &nbsp; &nbsp; |
            <input type="radio" name="selectedSubject" value="science"> Science &nbsp; &nbsp; |
            <input type="radio" name="selectedSubject" value="social"> Social &nbsp; &nbsp; |
            <br>
            <input type="button" value="Select Records" onclick="selectRecords();">
            <input type="hidden" name="submitType" id="submitType" value="">
        </form>


    </body>
</html>
