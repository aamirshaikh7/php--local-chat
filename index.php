<?php
	include 'includes/dbhandler.inc.php';
?>

<?php
	// create a select query

	$query = "SELECT * FROM shouts ORDER BY id DESC;";
	$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Shout it !</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<div id="container">
		<header>
			<h1>Shout it ! SHOUT-BOX</h1>
		</header>

		<div id="shouts">
			<ul>

			<?php while($row = mysqli_fetch_assoc($result)) {	?>

				<li class="shout">
					<span>   <?php echo $row['time']; ?> - </span>
					<strong> <?php echo $row['user']; ?> </strong> : 
					         <?php echo $row['message']; ?>
				</li>

			<?php }  ?>
			
			</ul>
		</div>

		<!-- inputs -->

		<div id="input">

			<?php if(isset($_GET['error'])) { ?>

				<div class="error"><?php echo $_GET['error']; ?></div>

			<?php } ?>

			<form method="POST" action="includes/process.inc.php">
				<input type="text" name="user" placeholder="Enter name">
				<input type="text" name="message" placeholder="Enter message">
				<br>
				<input type="submit" name="submit" value="Shout It out" class="shout-btn">
			</form>

		</div>

	</div>
</body>
</html>