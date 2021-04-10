<!-- -- contributed by:
	-- Name: Ishan Bhatia
	-- Banner Number: B00835259
	-- Implemented the functionality to establish a connection to the database -->
	
<?php

	$hostservername = "db.cs.dal.ca";
	$username = "jiahaog";
	$password = "p358RDHPAJWNpqom8Caa9bxir";
	$dbname = "jiahaog";

	$dbconnection = new mysqli($hostservername, $username, $password, $dbname);

	if ($dbconnection->connect_error) {
		die("No connection<br>" . $dbconnection->connect_error);
	}
?>
