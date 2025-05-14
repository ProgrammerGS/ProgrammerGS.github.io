<!-- Programmer Name: 46 -->
<!-- Retrieves the names of all customers in the database -->

<?php
	$query = "SELECT * FROM customer";
	$result = mysqli_query($connection,$query);
	if (!$result) {
		die("databases query failed.");
	}

	while ($row = mysqli_fetch_assoc($result)) {
		echo "<option value='";
		echo $row["cusid"];
		echo "'>" . $row["firstname"] . " " . $row["lastname"] . "<br>";
	}

	mysqli_free_result($result);
?>
