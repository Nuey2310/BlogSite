<?php session_start(); ?>

<!-- -- contributed by:
	-- Name: Ishan Bhatia
	-- Banner Number: B00835259
	-- Implemented the front end layout for the header and included the navigation links including logout
	-- User Story: 3 -->
	
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>JediTweeps</title>
	
	<!-- Link retrieved from: https://getbootstrap.com
		 Date Accessed: 7th March 2021
		 Author: Bootstrap developers and contributors -->

	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

	<!-- Link retrieved from: https://www.bootstrapcdn.com/fontawesome
		 Date Accessed: 7th March 2021
		 Author: Bootstrap developers and contributors -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/style.css" type='text/css'>

</head>

<body>
<!-- 
	-- contributed by
	-- Name: Miftahul Kashfy
	-- Banner Number: B00850212
	-- Implemented the functionality to search the tweets and retweets based on person's name or twitter handle 
	-- User Story: 5
-->

<header>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

		<!-- This code for the navbar has been used with some modification and has been 
			retrieved from example on getbootstrap.com. 

			Retrieved from: https://getbootstrap.com/docs/5.0/components/navbar/
			Date Accessed: 7th March 2021
			Author: Bootstrap developers and contributors -->
		
		  <div class="container-fluid p-2">
		    <a class="navbar-brand" href="mainFeed.php">JEDI TWEEPS</a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarScroll">
		      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="../mainFeed.php">Home</a>
		        </li>
				<?php if($_SESSION['admin'] == 1) { ?>
		        <li class="nav-item">
		          <a class="nav-link" href="admin-interface.php">Create Account</a>
		        </li>
				<?php } ?>
		        <li class="nav-item dropdown">
		          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
		            Profile
		          </a>
		          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
		            <li><a class="dropdown-item" href="profile.php">View my profile</a></li>
		            <li><a class="dropdown-item" href="#">Manage blocks</a></li>
		            <li><hr class="dropdown-divider"></li>
		            <li><a class="dropdown-item" href="#">Something else here</a></li>
		          </ul>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="includes/logout.php" aria-disabled="true">Logout</a>
		        </li>
		      </ul>
		      <form class="d-flex">
		        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="navbar-searchbar" name="search-keywords">
		        <button class="btn btn-primary " type="submit" id="navbar-button"><i class="fa fa-search" aria-hidden="true"></i></button>
		      </form>
		      <?php 
		      		// If the user searches for a user, the Session variable is set
		      		if (isset($_GET['search-keywords'])) {
		      			$_SESSION['search'] = $_GET['search-keywords'];
		      		}
		      		
		       ?>
		      
		    </div>
		  </div>
	</nav>


</header>
