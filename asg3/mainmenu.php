<!-- Programmer Name: 46 -->
<!-- Main webpage that displays all of the changes that can be made to the database-->

<!DOCTYPE html>
<html>
<head>
	<title>Donut Delivery Service</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
	<?php include "connectdb.php";?>

	<a id="top" style="padding: 0px;">
	<div id="navbar">
		<a href="#top" style="padding-right: 120px;">Donut Delivery Service</a>
		<a href="#menuitems">Menu Items</a>
		<a href="#orders">Orders</a>
		<a href="#drivers">Drivers</a>
		<a href="#resetdatabase">Reset Database</a>
		<a href="#mel">Give Mel Donuts!</a>
	</div>
	<h1>Donut Delivery Service</h1>

	<table class="website">
	<!-- Ordering menu items -->
	<tr><td style="padding-top: 75px;">
	<p>
		Use this delivery service to assign drivers to send orders to customers!
		You can view menu items, modify or delete them, add new orders, view orders, and see all drivers with no deliveries.
		The database can be reset to its initial state for testing.
	</p>
	<p>
		There is also a feature for sending donuts to a customer named Mel. Try it out!
	</p>
	</td></tr>

	<tr id="menuitems"><td style="padding-top: 75px;">
	<h2><strong>Menu Items</strong></h2>
	<h4>View All Menu Items</h4>
	<p>Order by: </p>
	<form action="viewmenuitems.php" method="post">
		<input type="radio" name="orderid" value="ORDER BY dishname" checked="checked">Dish name ascending<br>
		<input type="radio" name="orderid" value="ORDER BY dishname DESC">Dish name descending<br>
		<input type="radio" name="orderid" value="ORDER BY price">Price ascending<br>
		<input type="radio" name="orderid" value="ORDER BY price DESC">Price descending<br>
		<input type="submit" value="See Menu">
	</form><br>
	</td></tr>



	<!-- Modify or delete existing menu item -->
	<tr><td>
	<h4>Modify or Delete Menu Item</h4>
	<form action="modifymenuitem.php" method="post">
		<select name="menuitemid">
			<option value="NULLVALUE">SELECT A MENU ITEM</option>
			<?php include "getmenuitems.php";?>
		</select><br>
		--Modifications--<br>
		<p>
		Price: $<input type="number" name="price" min="1" max="50" value="15"><br>
		Calorie Count: <input type="number" name="caloriecount" min="1" max="1000" value="500"><br>
		</p>
		<input type="submit" value="Modify">
		<input type="submit" formaction="deletemenuitem.php" value="Delete"
		onclick="return confirmDeletion()">
	</form><br>
	</td></tr>


	<!-- Inserting new order -->
	<tr id="orders"><td style="padding-top: 75px;">
	<h2><strong>Orders</strong></h2>
	<h4>Add New Order</h4>
	<!-- Picking driver and customer from list-->
	<form action="addneworder.php" method="post" enctype="multipart/form-data">
		<p>
		Order ID: <input type="text" name="orderid"><br>
		Delivery Address: <input type="text" name="deladdress"><br>
		Date Placed: <input type="date" name="dateplaced" value="2025-01-01"><br>
		Time Placed: <input type="time" name="timeplaced" value="17:00"><br>
		Time Delivered: <input type="time" name="timedelivered" value="18:00"><br>
		Delivery Rating: <input type="number" name="delrating" min="1" max="5" value="5"><br>

		Driver:
		<select name="driverid">
			<option value="NULLVALUE">SELECT A DRIVER</option>;
			<?php include "getdrivers.php";?>
		</select><br>

		Customer:
		<select name="cusid">
			<option value="NULLVALUE">SELECT A CUSTOMER</option>;
			<?php include "getcustomers.php";?>
		</select><br>

		Is it a pickup order?
		<select name="pickuporder">
			<option value="N">No</option>
			<option value="Y">Yes</option>
		</select><br>

		Menu Item:
		<select name="menuitemid">
			<option value="NULLVALUE">SELECT A MENU ITEM</option>
			<?php include "getmenuitems.php";?>
		</select><br>

		Quantity: <input type="number" name="quantity" min="1" max="10" value="1"><br>
		</p>
		<input type="submit" value="Add Order">
	</form><br>
	</td></tr>



	<!-- View order -->
	<tr><td>
	<h4>View Order</h4>
	<p>If you cannot see an order you added or if you see an order you deleted, refresh the page.</p>
	<form action="vieworder.php" method="post">
		<select name="orderid">
			<option value="NULLVALUE">SELECT AN ORDER</option>
			<?php include "getorders.php";?>
		</select><br>
		<input type="submit" value="View Order">
	</form><br>
	</td></tr>



	<!-- Display drivers with no deliveries -->
	<tr id="drivers"><td style="padding-top: 75px;">
	<h2><strong>Drivers</strong></h2>
	<h4>View Drivers With No Deliveries</h4>
	<form action="viewdrivers.php" method="post">
		<input type="submit" value="See Drivers">
	</form>
	</td></tr>



	<!-- Resetting the database to its default state -->
	<tr id="resetdatabase"><td style="padding-top: 75px;">
	<h2><strong>Reset Database</strong></h2>
	<p>This resets the database to its initial state.</p>
	<p>Refresh the page after clicking the button.</p>
	<form action="resetdatabase.php" method="post">
		<input type="submit" value="Reset Database">
	</form><br>
	</td></tr>



	<!-- Give Mel Donuts! -->
	<tr id="mel"><td style="padding-top: 75px; padding-bottom: 75px;">
	<h2><strong>Give Mel Donuts!</strong></h2>
	<p>Mel loves donuts! Place an order to give her some!</p>
	<p>Either one of her friends Anna or Sara can send the order over.</p>
	<?php include "getmeldonuts.php";?>
	<form action="givemeldonuts.php" method="post">
		<p>
		Order ID: <input type="text" name="orderid"><br>
		How many donuts? <input type="number" name="quantity" min="1" max="10" value="1"><br>

		Driver:
		<select name="driverid">
			<option value="D163">Sara Midorikawa</option>
			<option value="D147">Anna Akagi</option>
		</select><br>
		</p>

		<input type="submit" value="Send Order">
	</form><br>
	<p>Note: You can reset the database above if she already has more than 10 donuts.</p>
	</td></tr>
	</table>

	<?php mysqli_close($connection);?>

	<script>
		function confirmDeletion() {
			return confirm("Are you sure you want to delete the menu item? Press OK to delete it.");
		}
	</script>

</body>
</html>
