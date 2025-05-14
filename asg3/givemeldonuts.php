<!-- Programmer Name: 46 -->
<!-- Webpage that displays Mel and the amount of donuts that she currently has -->

<!DOCTYPE html>
<html>
<head>
	<title>Delivery Service - Mel's Donuts</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
<?php
	include "connectdb.php";

	$orderID = $_POST["orderid"];
	$quantity = $_POST["quantity"];
	$driverID = $_POST["driverid"];

	$queryAddDonuts = "INSERT INTO cusorder VALUES ('" . $orderID .
	"', '17 Akagi Street', '2025-04-23', '18:00:00', '19:00:00', " .
	"'Y', 5, '" . $driverID . "', 'C153')";
	$queryAddOrder = "INSERT INTO overallorder VALUES ('" .
	$orderID . "', 'MMSA', " . $quantity . ")";

	$queryNoOrder = "SELECT orderid FROM cusorder WHERE cusorder.orderid = '" . $orderID . "'";
	$resultNoOrder = mysqli_query($connection, $queryNoOrder);

	$queryNoDonut = "SELECT * FROM menuitem WHERE menuitem.menuitemid = 'MMSA'";
	$resultNoDonut = mysqli_query($connection, $queryNoDonut);

	$resultAddDonuts = mysqli_query($connection, $queryAddDonuts);
	$resultAddOrder = mysqli_query($connection, $queryAddOrder);

	echo "<h1>Mel's Donuts</h1>";
	echo "<table class='website'><tr><td>";
	echo "<br><br><br>";

	if (mysqli_num_rows($resultNoOrder) > 0) {
		echo "<p>The given order ID already exists.</p>";
	} else if (mysqli_num_rows($resultNoDonut) <= 0) {
		echo "<p>The donut menu item has been deleted. Please reset the database.</p>";
	} else {
		// displaying all of her donuts
		echo "<p>Mel wants at least 10 donuts.</p>";
		include "getmeldonuts.php";

		if ($driverID == 'D163') {
			echo "<p><em>Driver Sara</em></p>";
			echo "<div style='display: flex;'>";
			echo "<img src='images/sara.png' style='border: 10px solid #505050; border-right: 0px;'>";
		} else {
			echo "<p><em>Driver Anna</em></p>";
			echo "<div style='display: flex;'>";
			echo "<img src='images/anna.png' style='border: 10px solid #505050; border-right: 0px;'>";
		}

		include "setmelimage.php";
		echo "</div>";
	}

	echo "<br><br><br>";
	echo "</td></tr></table>";
	mysqli_close($connection);
?>

<br><a class="return" href="javascript:history. go(-1)">Return to Main Page</a>
</body>
</html>
