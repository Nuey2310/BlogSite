

<?php

	/*

	Contributed by:
	Name: Miftahul Kashfy
	Banner Number: B00850212
	Implemented the functionality of posting a tweet
	User Story: 8

			This code to implement posting a tweet and showing appropriate message
			modification from my submission for Assignment 3 in CSCI 2170 (Winter 2021).
					
			Miftahul Kashfy Assignment 3: CSCI 2170 (Winter 2021), Faculty of Computer Science,
			Dalhousie University. Available online on Gitlab at [URL]:
			https://git.cs.dal.ca/courses/2021-winter/csci-2170/a3/kashfy
			Date accessed: April 1st 2021
	*/

	//Process the submitted tweet post here.
	require_once "db.php"; 

	$dsn = "mysql:host=localhost;dbname=2170db";
	$username = "root";
	$password = "root";
	$pdo = new PDO($dsn, $username, $password);
	
	session_start();

	//retrieving data from tweet post form
	$tweep = $_POST['tweepText'];
	$date = date("Y-m-d H:i:s");
	$userID = $_SESSION['userid'];

	//inserting the new tweet into the database
	$querySQL="INSERT INTO `Tweets`(`author_id`, `dateCreated`, `text`) VALUES (?,?,?)";

	$statement = $pdo->prepare($querySQL);
	$statement->execute([$userID,$date,$tweep]);
	
	//once the data has been processed, redirect to main feed page and show appropriate message
	if ($statement){
		header("Location: ../mainFeed.php?tweep-success=1");

	}


?>