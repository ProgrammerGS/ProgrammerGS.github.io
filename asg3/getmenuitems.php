<!-- Programmer Name: 46 -->
<!-- Retrieves the ids of all menu items in the database -->

<?php
	$query = "SELECT * FROM menuitem;";
	$result = mysqli_query($connection,$query);
	if (!$result) {
		die("databases query failed.");
	}

	while ($row = mysqli_fetch_assoc($result)) {
		echo "<option value='" . $row["menuitemid"] . "'>" . $row["dishname"] . "</option>";
	}

	mysqli_free_result($result);
?>
