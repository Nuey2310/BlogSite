<!-- -- contributed by:
	-- Name: Ishan Bhatia
	-- Banner Number: B00835259
	-- Implemented the functionality to logput of the website
	-- User Story: 3 -->
	
<?php

	/*
	 * Logout script: session destroy functionality implemented based on 
	 * the script available on PHP.net
	 * URL: https://www.php.net/manual/en/function.session-destroy.php
	 * Date accessed: 17 Feb 2021
	 * Author: PHP.net contributors
	 */

	session_start();

	$_SESSION = array();

	if (ini_get("session.use_cookies")) {
		$params = session_get_cookie_params();
		setcookie(session_name(), '', time() - 42000,
			$params["path"], $params["domain"],
			$params["secure"], $params["httponly"]
		);
	}

	session_destroy();

	header("Location: ../index.php?logout=1");


?>
