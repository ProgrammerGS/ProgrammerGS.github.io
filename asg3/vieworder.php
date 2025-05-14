<!-- Programmer Name: 46 -->
<!-- Webpage for displaying all information for the order with the given order id -->

<!DOCTYPE html>
<html>
<head>
	<title>Delivery Service - Order Information</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<?php
	include "connectdb.php";

	$orderID = $_POST["orderid"];
	$queryViewOrder="SELECT *, (quantity * price) AS totalprice FROM " .
	"((overallorder JOIN ((cusorder JOIN (SELECT cusid, firstname AS " .
	"cusfirstname, lastname AS cuslastname FROM customer) " .
	"AS customer ON cusorder.cusid = customer.cusid) " .
	"JOIN driver on cusorder.driverid = driver.driverid) " .
	"ON overallorder.orderid = cusorder.orderid) " .
	"JOIN menuitem ON overallorder.menuitemid = menuitem.menuitemid) " .
	"WHERE cusorder.orderid = '" . $orderID . "'";

	echo "<h1>View Order</h1>";
	echo "<table class='website'<tr><td>";

	$queryExists = "SELECT orderid FROM cusorder WHERE cusorder.orderid = '" . $orderID . "'";
	$resultExists = mysqli_query($connection, $queryExists);
	if (!$resultExists || mysqli_num_rows($resultExists) <= 0) {
		echo "No order has been chosen.";
	} else {
		$resultViewOrder = mysqli_query($connection, $queryViewOrder);
		if (!$resultViewOrder) {
			die("database queryorder failed");
		}
		$row = mysqli_fetch_assoc($resultViewOrder);

		echo "<br><br><br>";
		echo "<h2>Order " . $row["orderid"] . "</h2>";
		echo "Driver name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
		echo "Customer name: " . $row["cusfirstname"] . " " . $row["cuslastname"] . "<br>";
		echo "Date ordered: " . $row["dateplaced"] . "<br>";
		echo "Time ordered: " . $row["timeplaced"] . "<br>";
		echo "Time delivered: " . $row["timedelivered"] . "<br>";
		echo "Rating: " . $row["deliveryrating"] . "<br>";

		echo "<br><br><br>";
		echo "<table>";
		echo "<tr>";
		echo "<td class='inner'>Menu Item</td>";
		echo "<td class='inner'>Quantity</td>";
		echo "<td class='inner'>Calculated Price</td>";
		echo "</tr>";

		echo "<td class='inner'>" . $row["dishname"] . "</td>";
		echo "<td class='inner'>" . $row["quantity"] . "</td>";
		echo "<td class='inner'>$" . $row["totalprice"] . "</td>";

		while ($row = mysqli_fetch_assoc($resultViewOrder)) {
			echo "<tr>";
			echo "<td class='inner'>" . $row["dishname"] . "</td>";
			echo "<td class='inner'>" . $row["quantity"] . "</td>";
			echo "<td class='inner'>$" . $row["totalprice"] . "</td>";
			echo "</tr>";
		}

		echo "</table>";
		mysqli_free_result($resultViewOrder);
		mysqli_free_result($resultExists);
	}

	echo "<br><br><br>";
	echo "</td></tr></table>";
	mysqli_close($connection);
?>

<br><a class="return" href="javascript:history. go(-1)">Return to Main Page</a>
</body>
</html>
