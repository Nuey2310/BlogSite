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


<header>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

		<!-- This code for the navbar has been used with some modification and has been 
			retrieved from example on getbootstrap.com. 

			Retrieved from: https://getbootstrap.com/docs/5.0/components/navbar/
			Date Accessed: 7th March 2021
			Author: Bootstrap developers and contributors -->
		
		  <div class="container-fluid p-2">
		    <a class="navbar-brand" href="#">JEDI TWEEPS</a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarScroll">
		      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="#">Home</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="#">Link</a>
		        </li>
		        <li class="nav-item dropdown">
		          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
		            Link
		          </a>
		          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
		            <li><a class="dropdown-item" href="#">Action</a></li>
		            <li><a class="dropdown-item" href="#">Another action</a></li>
		            <li><hr class="dropdown-divider"></li>
		            <li><a class="dropdown-item" href="#">Something else here</a></li>
		          </ul>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="includes/logout.php" aria-disabled="true">Logout</a>
		        </li>
		      </ul>
		      <form class="d-flex">
		        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="navbar-searchbar" >
		        <button class="btn btn-primary " type="submit" id="navbar-button"><i class="fa fa-search" aria-hidden="true"></i></button>
		      </form>
		    </div>
		  </div>
	</nav>


</header>