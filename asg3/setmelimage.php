<!-- Programmer Name: 46 -->
<!-- Sets Mel's image based on the amount of donuts that she currently has -->

<?php
	$queryGetDonuts = "SELECT SUM(quantity) AS donutcount FROM " .
	"(overallorder JOIN cusorder ON overallorder.orderid = cusorder.orderid) " .
	"WHERE cusid = 'C153' AND menuitemid = 'MMSA'";

	$resultGetDonuts = mysqli_query($connection, $queryGetDonuts);
	if (!$resultGetDonuts) {
		die("databases query failed");
	}

	$row = mysqli_fetch_assoc($resultGetDonuts);

	if ($row["donutcount"] >= 10) {
		echo "<img src='images/mel_donut.png' style='border: 10px solid #505050; border-left: 0px;'>";
	} else {
		echo "<img src='images/mel_default.png' style='border: 10px solid #505050; border-left: 0px;'>";
	}
	mysqli_free_result($resultGetDonuts);
?>
