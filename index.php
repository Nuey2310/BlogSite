<?php
	
	session_start();
	require_once "includes/db.php";

?>


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

<div class="mainScreen">
	<div class="left">
		<section class="logInContent">
			<h1 class="mainLogInHead">Connect with the world</h1>
			<p>Sed tempor incididunt officia fugiat magna laborum.</p>
		</section>
	</div>
	<div class="right">

		<!-- includes/login -->
		<form action="includes/login.php" method="post">

			<section class="logInContent">
				<h1>Log In</h1>
				<br>
				<p id="loginPara">Do incididunt magna laborum laborum ut consequat id elit.</p>
			</section>

			<div class="input-container name">
				<label for="firstName">Username</label>
				<input id="firstName" type="text" name="firstName" placeholder="Username" required="required" autofocus="">
			</div>

			<div class="input-container Password">
				<label for="passwordField">Password</label>
				<input id="passwordField" type="password" name="passwordField" placeholder="Password" required="required">
			</div>

			<div class="text-center">
				<?php

				if(isset($_GET['loginerror'])){

					echo "<p style = 'color:red;'>Wrong username or password. Please try again.</p>";
				}
				?>
			</div>

			<div class="buttonContainer">
				<button class="login-btn" name="submit-login" type="submit">LOG IN</button>
				<br>
				<!-- testing purposes only -->
				<a href="mainFeed.php">testing purposes only -> Main Feed</a>
			</div>

			<section class="copy-legal">
				<p> By continuing you agree to accept our <a href=# id="privacyPolicy">Privacy Policy</a> </p>
			</section>

		</form>

		<!-- <pre>
			<?php
			// print_r($_POST);
			?>
		</pre>
		 -->
	</div>
</div>

</body>

<!-- Link retrieved from: https://getbootstrap.com
	 Date Accessed: 7th March 2021
	 Author: Bootstrap developers and contributors -->

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</html>




