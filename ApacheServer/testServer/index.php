<!DOCTYPE HTML>
<html>  
    <head>
        <style>
            .error {
                color: #FF0000;
            }
        </style>
    </head>
    <body>
        <?php
        include 'welcome.php';
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            Name: <input type="text" name="name">
            <span class="error">
                * <?php echo $nameErr;?>
            </span>
            <br />
            <br />

            E-mail: <input type="text" name="email">
            <span class="error">* <?php echo $nameErr;?></span>
            <br />
            <br />

            Website: <input type="text" name="website" />
            <span class="error">* <?php echo $nameErr;?></span>
            <br />
            <br />

            Comment: <textarea name="comment" rows="5" cols="40"></textarea>
            <br />
            <br />
            <input type="radio" name="gender" value="male"/>Male
            <input type="radio" name="gender" value="female"/>Female
            <span class="error">* <?php echo $nameErr;?></span>
            <br />
            <br />

            <input type="submit">
        </form>

        <?php
        echo "<h2>Your Input:</h2>";
        echo $name;
        echo "<br>";
        echo $email;
        echo "<br>";
        echo $website;
        echo "<br>";
        echo $comment;
        echo "<br>";
        echo $gender;
        ?>

    </body>
</html>
