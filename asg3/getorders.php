<!-- Programmer Name: 46 -->
<!-- Retrieves the ids of all orders in the database -->

<?php
	$query = "SELECT * FROM cusorder;";
	$result = mysqli_query($connection,$query);
	if (!$result) {
		die("databases query failed.");
	}

	while ($row = mysqli_fetch_assoc($result)) {
		echo "<option value='" . $row["orderid"] . "'>" . $row["orderid"] . "</option>";
	}

	mysqli_free_result($result);
?>
