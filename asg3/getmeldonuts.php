<!-- Programmer Name: 46 -->
<!-- Retrieves the amount of donuts that Mel currently has -->

<?php
	$queryGetDonuts = "SELECT SUM(quantity) AS donutcount FROM " .
	"(overallorder JOIN cusorder ON overallorder.orderid = cusorder.orderid) " .
	"WHERE cusid = 'C153' AND menuitemid = 'MMSA'";

	$resultGetDonuts = mysqli_query($connection, $queryGetDonuts);
	if (!$resultGetDonuts) {
		die("databases query failed");
	}

	$row = mysqli_fetch_assoc($resultGetDonuts);

	echo "<p> Mel currently has " . $row["donutcount"] . " donuts.</p>";
	mysqli_free_result($resultGetDonuts);
?>
