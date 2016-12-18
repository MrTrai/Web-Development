<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            File: <input type="text" name="file">
            <br />
            <input type="submit">
        </form>
        <br />

        <?php
            $fileName = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $fileName = $_POST["file"];
                $file = fopen($fileName, "r") or die("Can't open file");
                while(!feof($file)) {
                    echo fgets($file);
                    echo "<br />";
                }
            }
        ?>

    </body>
</html>
