<!-- Programmer Name: 46 -->
<!-- Connects to database, used by many files -->

<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "cs3319";
	$dbname = "assign2db";
	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	if (mysqli_connect_errno()) {
		die("database connection failed: " .
		mysqli_connect_error() .
		"(" . mysqli_connect_errno() . ")" );
	}
?>
