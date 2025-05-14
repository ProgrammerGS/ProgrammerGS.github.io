<!-- Programmer Name: 46 -->
<!-- Webpage for displaying information for all menu items in the database in a given order -->

<!DOCTYPE html>
<html>
<head>
	<title>Delivery Service - Menu Items</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<?php
	include "connectdb.php";

	$orderID = $_POST["orderid"];
	$queryMenuItem = "SELECT * FROM menuitem " . $orderID;
	$resultMenuItem = mysqli_query($connection,$queryMenuItem);
	if (!$resultMenuItem) {
		die("database query menu item failed");
	}

	echo "<h1>Menu Items</h1>";

	echo "<table class='website'><tr><td>";
	echo "<br><br><br>";
	echo "<table>";
	echo "<tr>";
	echo "<td class='inner'>Menu Item ID</td>";
	echo "<td class='inner'>Dish Name</td>";
	echo "<td class='inner'>Price</td>";
	echo "<td class='inner'>Calorie Count</td>";
	echo "<td class='inner'>Veggie</td>";
	echo "</tr>";

	while ($row = mysqli_fetch_assoc($resultMenuItem)) {
		echo "<tr>";
		echo "<td class='inner'>" . $row["menuitemid"] . "</td>";
		echo "<td class='inner'>" . $row["dishname"] . "</td>";
		echo "<td class='inner'>$" . $row["price"] . "</td>";
		echo "<td class='inner'>" . $row["caloriecount"] . "</td>";
		echo "<td class='inner'>" . $row["veggie"] . "</td>";
		echo "</tr>";
	}

	echo "</table>";
	echo "<br><br><br>";
	echo "</td></tr></table>";
	mysqli_free_result($resultMenuItem);
	mysqli_close($connection);
?>

<br><a class="return" href="javascript:history. go(-1)">Return to Main Page</a>
</body>
</html>
