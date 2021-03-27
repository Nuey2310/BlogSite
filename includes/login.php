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

		$tempData = $result->fetch_assoc();
		$_SESSION['firstname'] = $tempData['firstname'];
		$_SESSION['lastname'] = $tempData['lastname'];
		$_SESSION['handle'] = $tempData['handle'];
		$_SESSION['userid'] = $tempData['id'];
		$_SESSION['admin'] = $tempData['isAdmin'];

		/* I (dhairy) refered to the following source to learn about regenerating session Id and deleting old session
				The following code is reused from the same site
				* Author: PHP.net
				* URL: https://www.php.net/manual/en/function.session-regenerate-id.php
				* Date accessed: March 26, 2021 
			*/

			// Check destroyed time-stamp
			if (isset($_SESSION['destroyed'])
			    && $_SESSION['destroyed'] < time() - 300) {
			    // Should not happen usually. This could be attack or due to unstable network.
			    // Remove all authentication status of this users session.
			    remove_all_authentication_flag_from_active_sessions($_SESSION['userid']);
			    throw(new DestroyedSessionAccessException);
			}

			$old_sessionid = session_id();

			// Set destroyed timestamp
			$_SESSION['destroyed'] = time(); // Since PHP 7.0.0 and up, session_regenerate_id() saves old session data

			// Simply calling session_regenerate_id() may result in lost session, etc.
			// See next example.
			session_regenerate_id();

			// New session does not need destroyed timestamp
			unset($_SESSION['destroyed']);

			// Deleting the password from session variable for security 
			unset($_SESSION['password']);

			$new_sessionid = session_id();

			header("Location: ../mainFeed.php");
		
	}
	else{

		header("Location: ../index.php?loginerror=1");
	}


?>
