<?php
require_once "db.php";
session_start();
        //Sanitization
          /*
        MYSQLI:: real_escape_string
        Link: https://www.php.net/manual/en/mysqli.real-escape-string.php
        Accessed: 15 March 2021
        */
        echo "Hello";
        $password =  mysqli_real_escape_string($dbconnection, htmlspecialchars(stripslashes(trim($_POST['password']))));
        echo "$password";

        //Insert query
        $uId = $_SESSION['userid'];
        echo "$uId";
        $query = "UPDATE `Users` SET `password` = '$password' WHERE `Users`.`id` = $uId";
        if (!$dbconnection->query($query)) {
            echo "<p>ERROR.</p>";
        }
        header("Location: ../profile.php?passwordreset=1");

?>