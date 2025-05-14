<!-- Programmer Name: 46 -->
<!-- Webpage for displaying names and ids of all drivers with no deliveries in the database -->

<!DOCTYPE html>
<html>
<head>
	<title>Delivery Service - Drivers</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<?php
	include "connectdb.php";

	$queryDriver = "SELECT * FROM driver WHERE driverid NOT IN (SELECT driverid FROM cusorder WHERE driverid IS NOT NULL)";
	$resultDriver = mysqli_query($connection,$queryDriver);
	if (!$resultDriver) {
		die("database query drivers failed");
	}

	echo "<h1>Drivers With No Deliveries</h1>";

	echo "<table class='website'><tr><td>";
	echo "<br><br><br>";
	echo "<table>";
	echo "<tr>";
	echo "<td class='inner'>Driver ID</td>";
	echo "<td class='inner'>Driver Name</td>";
	echo "</tr>";

	while ($row = mysqli_fetch_assoc($resultDriver)) {
		echo "<tr>";
		echo "<td class='inner'>" . $row["driverid"] . "</td>";
		echo "<td class='inner'>" . $row["firstname"] . " " . $row["lastname"] . "</td>";
		echo "</tr>";
	}

	echo "</table>";
	echo "<br><br><br>";
	echo "</td></tr></table>";

	mysqli_free_result($resultDriver);
	mysqli_close($connection);
?>

<br><a class="return" href="javascript:history. go(-1)">Return to Main Page</a>
</body>
</html>
