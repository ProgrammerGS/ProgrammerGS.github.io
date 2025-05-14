<!-- Programmer Name: 46 -->
<!-- Webpage for displaying result after deleting a menu item -->

<!DOCTYPE html>
<html>
<head>
	<title>Delivery Service - Deleted Menu Item</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<?php
	include "connectdb.php";

	$menuItemID = $_POST["menuitemid"];
	$queryDelete = "DELETE FROM menuitem WHERE menuitemid = '" . $menuItemID . "'";

	$queryItemExists = "SELECT menuitemid FROM menuitem WHERE menuitem.menuitemid = '" . $menuItemID . "'";
	$queryNotOrdered = "SELECT menuitemid FROM overallorder WHERE overallorder.menuitemid = '" . $menuItemID . "'";
	$resultItemExists = mysqli_query($connection, $queryItemExists);
	$resultNotOrdered = mysqli_query($connection, $queryNotOrdered);

	echo "<h1>Delete Menu Item Result</h1>";
	echo "<table class='website'><tr><td>";
	echo "<br><br><br>";

	if (!$resultItemExists || mysqli_num_rows($resultItemExists) <= 0) {
		echo "<p class='center'>No menu item has been chosen.</p>";
	} else if (mysqli_num_rows($resultNotOrdered) > 0) {
		echo "<p class='center'>The menu item belongs to an order and cannot be deleted.</p>";
	} else {
		if (!mysqli_query($connection,$queryDelete)) {
			die("database query delete failed");
		}

		echo "<p class='center'>The menu item has been deleted.</p>";
	}

	echo "<br><br><br>";
	echo "</td></tr></table>";
	mysqli_close($connection);
?>

<br><a class="return" href="javascript:history. go(-1)">Return to Main Page</a>
</body>
</html>
