<!-- Programmer Name: 46 -->
<!-- Retrieves the names of all drivers in the database -->

<?php
	$query = "SELECT * FROM driver";
	$result = mysqli_query($connection,$query);
	if (!$result) {
		die("databases query failed.");
	}

	while ($row = mysqli_fetch_assoc($result)) {
		echo "<option value='";
		echo $row["driverid"];
		echo "'>" . $row["firstname"] . " " . $row["lastname"] . "</option><br>";
	}

	mysqli_free_result($result);
?>
