<!-- Programmer Name: 46 -->
<!-- Webpage for displaying result after modifying menu item -->

<!DOCTYPE html>
<html>
<head>
	<title>Delivery Service - Modified Menu Item</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<?php
	include "connectdb.php";

	$menuItemID = $_POST["menuitemid"];
	$price = $_POST["price"];
	$calorieCount = $_POST["caloriecount"];

	$queryPrice = "UPDATE menuitem SET price = " . $price . " WHERE menuitemid = '" . $menuItemID . "'";
	$queryCalories = "UPDATE menuitem SET caloriecount = " . $calorieCount . " WHERE menuitemid = '" . $menuItemID . "'";

	$queryItemExists = "SELECT menuitemid FROM menuitem WHERE menuitem.menuitemid = '" . $menuItemID . "'";
	$resultItemExists = mysqli_query($connection, $queryItemExists);

	echo "<h1>Modify Menu Item Result</h1>";
	echo "<table class='website'><tr><td>";
	echo "<br><br><br>";

	if (!$resultItemExists || mysqli_num_rows($resultItemExists) <= 0) {
		echo "<p class='center'>No menu item has been chosen.</p>";
	} else {
		if (!mysqli_query($connection,$queryPrice)) {
			die("database query price failed");
		}
		if (!mysqli_query($connection,$queryCalories)) {
			die("database query calories count failed");
		}

		echo "<p class='center'>The menu item has been modified.</p>";
	}

	echo "<br><br><br>";
	echo "</td></tr></table>";
	mysqli_close($connection);
?>

<br><a class="return" href="javascript:history. go(-1)">Return to Main Page</a>
</body>
</html>
