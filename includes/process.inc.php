<?php

	include 'dbhandler.inc.php';


	if(isset($_POST['submit']))
	{
		$user = mysqli_real_escape_string($conn, $_POST['user']);
		$message = mysqli_real_escape_string($conn, $_POST['message']);

		// set timezone
		//               timezone_identifier
		/*date_default_timezone_set('India/Mumbai');*/
		$time = date('h:i:s:a', time());

		// validate input
		if(empty($user) || empty($message))
		{
			$error = "Please fill-in your name and message !";

			header("Location: ../index.php?error=".urlencode($error));
			exit();
		}

		else
		{
			$query = "INSERT INTO shouts(user, message, time)
			VALUES('$user', '$message', '$time');";

			if(!mysqli_query($conn, $query))
			{
				die("Error : ".mysqli_error($conn));
			}

			else // success
			{
				header("Location: ../index.php");
				exit();
			}
		}
	}

	else
	{
		header("Location: ../index.php?signup=error");
		exit();
	}
