<?php

	session_start();

	require_once "db.php";

	//sanitizing the input
	$username = trim(stripslashes(htmlspecialchars($_POST['firstName'])));
	$password = trim(stripslashes(htmlspecialchars($_POST['passwordField'])));

	// verifying the username and the password using the database
	$querySQL = " select * from `Users` where handle = '". $username ."' " . " and password = '".$password."' ";

	$result = $dbconnection->query($querySQL);

	if($result->num_rows > 0){

		session_unset();
		session_destroy();

		session_regenerate_id();

		header("Location: ../mainFeed.php");
		
	}
	else{

		header("Location: ../index.php?loginerror=1");
	}


?>
