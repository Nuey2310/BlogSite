<!-- 
	-- contributed by:
	-- Name: Arjun Banga
	-- Banner Number: B00852696
	--  Implemented the administrative interface which lets an admin create a new account with either microblog author or admin role
	-- User Story: 6
-->

<?php 
session_start();
if($_GET['verified'] != 1) {
    if (isset($_SESSION['handle'])) {
        header("Location: ../mainFeed.php?noaccess=1");
        die();
    }
    else {
        header("Location: ../index.php?noaccess=1");
        die();
    }   
}        

    require_once "db.php";
    
        //Sanitization
          /*
        MYSQLI:: real_escape_string
        Link: https://www.php.net/manual/en/mysqli.real-escape-string.php
        Accessed: 15 March 2021
        */
        $username = mysqli_real_escape_string($dbconnection, htmlspecialchars(stripslashes(trim($_POST['username']))));
        $password =  mysqli_real_escape_string($dbconnection, htmlspecialchars(stripslashes(trim($_POST['password']))));
        $firstname =  mysqli_real_escape_string($dbconnection, htmlspecialchars(stripslashes(trim($_POST['firstname']))));
        $lastname = mysqli_real_escape_string($dbconnection, htmlspecialchars(stripslashes(trim($_POST['lastname']))));
        $admin = isset($_POST['admin']) ? 1 : 0;
        //Insert query
        $sql = "INSERT INTO Users (handle, firstname, lastname, isAdmin, password) VALUES ('$username','$firstname', '$lastname', '$admin', '$password')";
        if (!$dbconnection->query($sql)) {
            echo "<p>ERROR.</p>";
        }
        header("Location: ../mainFeed.php");
?>
