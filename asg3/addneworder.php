<!-- Programmer Name: 46 -->
<!-- Webpage for displaying result of adding a new order -->

<!DOCTYPE html>
<html>
<head>
	<title>Delivery Service - Added New Order</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<?php
	include "connectdb.php";

	$orderID = $_POST["orderid"];
	$delAddress = $_POST["deladdress"];
	$datePlaced = $_POST["dateplaced"];
	$timePlaced = $_POST["timeplaced"];
	$timeDelivered = $_POST["timedelivered"];
	$pickUpOrder = $_POST["pickuporder"];
	$delRating = $_POST["delrating"];
	$driverID = $_POST["driverid"];
	$cusID = $_POST["cusid"];
	$menuItemID = $_POST["menuitemid"];
	$quantity = $_POST["quantity"];

	$queryInsert = "INSERT INTO cusorder VALUES ('" . $orderID . "','" . $delAddress .
	"','" . $datePlaced . "','" . $timePlaced . ":00','" . $timeDelivered . ":00','" .
	$pickUpOrder . "','" . $delRating . "','" . $driverID . "','" . $cusID . "')";
	$queryInsertOrder = "INSERT INTO overallorder VALUES ('" . $orderID . "','" .
	$menuItemID . "'," . $quantity . ")";

	$queryNoOrder = "SELECT orderid FROM cusorder WHERE cusorder.orderid = '" . $orderID . "'";
	$queryDriverExists = "SELECT driverid FROM driver WHERE driver.driverid = '" . $driverID . "'";
	$queryCusExists = "SELECT cusid FROM customer WHERE customer.cusid = '" . $cusID . "'";
	$queryItemExists = "SELECT menuitemid FROM menuitem WHERE menuitem.menuitemid = '" . $menuItemID . "'";

	$resultNoOrder = mysqli_query($connection, $queryNoOrder);
	$resultDriverExists = mysqli_query($connection, $queryDriverExists);
	$resultCusExists = mysqli_query($connection, $queryCusExists);
	$resultItemExists = mysqli_query($connection, $queryItemExists);

	echo "<h1>Add New Order Result</h1>";
	echo "<table class='website'><tr><td>";
	echo "<br><br><br>";

	if (strtotime($timePlaced) >= strtotime($timeDelivered)) {
		echo "<p class='center'>The time placed has to be before the time delivered.</p>";
	} else if (mysqli_num_rows($resultNoOrder) > 0) {
		echo "<p class='center'>The given order ID already exists.</p>";
	} else if (!$resultDriverExists || mysqli_num_rows($resultDriverExists) <= 0) {
		echo "<p class='center'>No driver has been selected.</p>";
	} else if (!$resultCusExists || mysqli_num_rows($resultCusExists) <= 0) {
		echo "<p class='center'>No customer has been selected.</p>";
	} else if (!$resultItemExists || mysqli_num_rows($resultItemExists) <= 0) {
		echo "<p class='center'>No menu item has been selected.</p>";
	} else {
		if (!mysqli_query($connection,$queryInsert)) {
			die("Error: insert failed");
		}
		if (!mysqli_query($connection,$queryInsertOrder)) {
			die("Error: insert failed");
		}
		echo "<p class='center'>Your order has been added.</p>";
	}

	echo "<br><br><br>";
	echo "</td></tr></table>";
	mysqli_close($connection);
?>

<br><a class="return" href="javascript:history. go(-1)">Return to Main Page</a>
</body>
</html>
